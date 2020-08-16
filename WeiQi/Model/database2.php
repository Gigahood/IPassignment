<?php

include_once 'DatabaseConnection.php';

class database2 extends DatabaseConnection {
    private static $instance2 = null;
   
    
    private function __construct($dSession) {
//        self :: $instance2 = parent::$instance;
       
    }
    
    public static function getInstance2($dsession) {
        self :: $instance2 = new database2($dsession);
        return  self :: $instance2;
    }
    
    public function getUser2() {
        echo "getUser2";
        
        $var1 = 2;

        $query = "SELECT * FROM participantlist WHERE participant_List_ID = ?";
        $stmt = parent::$db ->prepare($query);
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
}
