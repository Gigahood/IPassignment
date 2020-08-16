<?php
/**
 * Description of UserDBConnection
 *
 * @author User
 */
class UserDBConnection extends AbstractDatabaseConnection {
    private function __construct($dSession) {
        parent::__construct();
    }
    
    public static function getInstance($dSession) {
        parent::getInstance($dSession);
    }
    
    public function getUser() {
        $var1 = 100;
        
        
        $query = "SELECT * FROM participantlist WHERE participant_List_ID = ?";
        $stmt = $this->db->prepare($query);
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
