<?php
include_once '../../Ultilities/TwoWayEncryption.php';
/**
 * Description of AbstractDatabaseConnection
 *
 * @author Kuek Yong Boon
 */
abstract class AbstractDatabaseConnection {

    protected static $instance = null;
    protected static $db;
    public static $count;
    public static $session;

    private function __construct($dSession) {

        $ini = parse_ini_file('../../Ultilities/config.ini');
        $encrytIni = parse_ini_file('../../Ultilities/encrypt.ini');
        $cryptor1 = new Cryptor($encrytIni['db_encrypt_key']);


        $host = $ini['db_host'];
        $dbName = $ini['db_name'];
        
        $dsn = "mysql:host=$host;dbname=$dbName";

        static::$session = $dSession;

        try {
            if ($dSession == "student") {
                $user = $ini['db_student_user'];
                $password = $cryptor1->decrypt($ini['db_student_password']);
            } else if ($dSession == "staff") {
                $user = $ini['db_staff_user'];
                $password = $cryptor1->decrypt($ini['db_staff_password']);
            } else if ($dSession == "admin") {
                $user = $ini['db_admin_user'];
                $password = $cryptor1->decrypt($ini['db_admin_password']);
            } else {
                $user = $ini['db_guest_user'];
                $password = $cryptor1->decrypt($ini['db_guest_password']);
            }
            static::$db = new PDO($dsn, $user, $password);
            static::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $ex) {
            echo "<p>ERROR: " . $ex->getMessage() . "</p>";
            exit;
        }
    }

    public static function getInstance($dSession) {
        static $instances = array();

        $calledClass = get_called_class();

        if (!isset($instances[$calledClass]) || self::$session != $dSession) {
            $instances[$calledClass] = new $calledClass($dSession);
        }
        return $instances[$calledClass];
    }

    // close connection
    public function closeConnection() {
        static::$db = null;
    }

}
