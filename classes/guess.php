<?php
  class Guess{
    private $db;
    private $id;
    private $customerID;
    private $weekID;
    private $bonusPlayerID;

    public function __construct(PDO $db = null){
      $this->db = $db;
    }

    public function fromArray($a){
      $this->id = $a['id'];
      $this->customerID = $a['customerID'];
      $this->weekID = $a['weekID'];
      $this->bonusPlayerID = $a['bonusPlayerID'];
    }

    public function getCustomerID() {
      return $this->customerID;
    }

    public function getGuessID() {
      return $this->id;
    }

    public function getWeekID() {
      return $this->weekID;
    }

    public function getBonusPlayerID() {
      return $this->bonusPlayerID;
    }
  }
?>
