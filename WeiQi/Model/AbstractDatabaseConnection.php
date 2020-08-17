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
        $host = 'localhost';
        $dbName = 'ip_weiqi';

        $dsn = "mysql:host=$host;dbname=$dbName";

        static::$session = $dSession;

        try {
            if ($dSession == "staff") {
                $user = 'staff@tarc.edu.my';
                $password = 'staff123';
                static::$db = new PDO($dsn, $user, $password);
            } else if ($dSession == "student") {
                $user = 'student@tarc.edu.my';
                $password = 'student123';
                static::$db = new PDO($dsn, $user, $password);
            }else {
                $user = 'root';
                $password = '';
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
