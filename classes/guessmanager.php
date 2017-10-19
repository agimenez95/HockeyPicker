<?php
include_once '../logic/prereq.php';

class GuessManager {
  private $db;
  public $id;

  public function __construct(PDO $db){
      $this->db = $db;
  }

  public function save($customerID, $weekID, $bonusPlayerID){
    $this->db->beginTransaction();
    $stmt = $this->db->prepare("
        insert into
        Guess (customerID,  weekID, bonusPlayerID)
        values (:customerID, :weekID, :bonusPlayer)
    ");
    $worked = $stmt->execute([
        'customerID' => $customerID,
        'weekID' => $weekID,
        'bonusPlayer' => $bonusPlayerID
    ]);
    if (!$worked){
        $this->db->rollback();
        return false;
    }
    $this->id = $this->db->lastInsertId();
    //return $this->db->commit();
  }

  public function references($matchID, $guessID) {
    $this->db->beginTransaction();
    $stmt = $this->db->prepare("
        insert into
        Prediction (matchupID,  guessID)
        values (:mid, :gid)
    ");
    $worked = $stmt->execute([
        'mid' => $matchID,
        'gid' => $guessID
    ]);
    if (!$worked){
        $this->db->rollback();
        return false;
    }
    //return $this->db->commit();
  }
}
?>
