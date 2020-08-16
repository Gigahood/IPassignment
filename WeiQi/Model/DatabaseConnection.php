<?php

/**
 * Description of Database
 *
 * @author Kuek Yong Boon
 */
class DatabaseConnection {

    protected static $instance = null;
    protected static $db;
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
                self::$db = new PDO($dsn, $user, $password);
                echo "<p>Connection to database successful</p>";
            } else {
                $user = 'root';
                $password = '';
                self::$db = new PDO($dsn, $user, $password);
                echo "<p>Connection to database successful</p>";
            }
        } catch (PDOException $ex) {
            echo "<p>ERROR: " . $ex->getMessage() . "</p>";
            exit;
        }
    }

    public static function getInstance($dSession) {
        if (self::$instance == null || self::$session != $dSession) {

            self::$instance = new DatabaseConnection($dSession);
        } else {
            self::$count += 1;
        }

        echo self::$count;

        return self::$instance;
    }

    public function getSession() {
        return self::$session;
    }
    
    

    public function addUser() {
        $var1 = 123;
        $var2 = 234;
        $var3 = 999;

        try {
            $query = "INSERT INTO participantlist(participant_List_ID, history_ID, user_ID) VALUES (?, ?, ?)";
            $stmt = self::$db->prepare($query);
            $stmt->bindParam(1, $var1);
            $stmt->bindParam(2, $var2);
            $stmt->bindParam(3, $var3);
            $stmt->execute();
            
            echo "123";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getUser() {
        $var1 = 100;
        
        
        $query = "SELECT * FROM participantlist WHERE participant_List_ID = ?";
        $stmt = self::$db->prepare($query);
        $stmt->bindParam(1, $var1, PDO::PARAM_INT);
        $stmt->execute();

        $totalrows = $stmt->rowCount();
        if ($totalrows == 0) {
            return null;
        } else {

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    // close connection
    public function closeConnection() {
        $this->db = null;
    }

}
