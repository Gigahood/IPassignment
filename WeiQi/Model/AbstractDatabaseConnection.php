<?php

/**
 * Description of AbstractDatabaseConnection
 *
 * @author Kuek Yong Boon
 */
abstract class AbstractDatabaseConnection {

    protected static $instance = null;
    protected $db;
    public static $count;
    public static $session;

    private function __construct($dSession) {
        $host = 'localhost';
        $dbName = 'ip_weiqi';


        $dsn = "mysql:host=$host;dbname=$dbName";

        self::$count = 1;

        self::$session = $dSession;

        try {
            if ($dSession == "staff") {
                $user = 'root';
                $password = '';
                $this->db = new PDO($dsn, $user, $password);
                echo "<p>Connection to database successful</p>";
            } else {
                $user = 'root';
                $password = '';
                $this->db = new PDO($dsn, $user, $password);
                echo "<p>Connection to database successful</p>";
            }
        } catch (PDOException $ex) {
            echo "<p>ERROR: " . $ex->getMessage() . "</p>";
            exit;
        }
    }
    
    protected static function getInstance($dSession) {
        if (self::$instance == null || self::$session != $dSession) {

            self::$instance = new DatabaseConnection($dSession);
        } else {
            self::$count += 1;
        }

        echo self::$count;

        return self::$instance;
    }

}
