<?php



require '../logic/prereq.php';

class guessmanager {

  //private $db;

  // public function __construct(PDO $db){
  //     $this->db = $db;
  // }





    public function save(Guess $g){

        $stmt = $this->db->prepare("
            insert into Guess (customerID, weekID, bonusPlayerID)
            values(:customerID, :weekID, :bonusPlayerID)
        ");



        $r = $stmt->execute([
            'customerID'  => $g->customerID,
            'weekID' => $g->weekID,
            'bonusPlayerID'=>$g->bonusPlayerID
        ]);
        $g->id = $this->db->lastInsertId();
    }
        return $stmt->execute([
            'customerID'  => $g->customerID,
            'weekID' => $g->weekID,
            'bonusPlayerID'=>$g->bonusPlayerID,
            'id'    => $g->id
        ]);
    }

}

?>
