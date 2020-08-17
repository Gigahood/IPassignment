<?php
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
//        $host = 'localhost';
//        $dbName = 'ip_weiqi';

        $ini = parse_ini_file('../Ultilities/config.ini');
        
        
        $host = $ini['db_host'];
        $dbName = $ini['db_name'];
        
        $dsn = "mysql:host=$host;dbname=$dbName";

        static::$session = $dSession;

        try {
            if ($dSession == "student") {
//                $user = 'staff@tarc.edu.my';
//                $password = 'staff123';
                $user = $ini['db_student_user'];
                $password = $ini['db_student_password'];
                static::$db = new PDO($dsn, $user, $password);
            } else if ($dSession == "staff") {
//                $user = 'student@tarc.edu.my';
//                $password = 'student123';
                $user = $ini['db_staff_user'];
                $password = $ini['db_student_password'];
                static::$db = new PDO($dsn, $user, $password);
            }else {
//                $user = 'root';
                $password = '';
                $user = $ini['db_admin_user'];
//                $password = $ini['db_admin_password'];
                static::$db = new PDO($dsn, $user, $password);
            }
        } catch (PDOException $ex) {
            echo "<p>ERROR: " . $ex->getMessage() . "</p>";
            exit;
        }
    }

    public static function getInstance($dSession) {
        static $instances = array();

        $calledClass = get_called_class();

        if (!isset($instances[$calledClass]) || self::$session != $dSession)
        {
            $instances[$calledClass] = new $calledClass($dSession);
        } 
        return $instances[$calledClass];
    }
    
    // close connection
    public function closeConnection() {
        static::$db = null;
    }

}
