<?php
  class Guess{
    public $id;
    public $customerID;
    public $weekID;
    public $bonusPlayerID;
    public $timeAndDateOfBet;

    function __construct($customerID = null,$weekID=null,$bonusPlayerID=null,$timeAndDateOfBet=null){
      $this->customerID = $customerID;
      $this->weekID = $weekID;
      $this->bonusPlayer = $bonusPlayer;
      $this->timeAndDateOfBet = time();
    }

    // public function toArray(array $a){
    //   $this->id = $a["id"];
    //   $this->customerID = $a["customerID"];
    //   $this->weekID = $a["weekID"];
    //   $this->bonusPlayerID = $a["bonusPlayerID"]
    // }
    //
    // public function fromArray(array $a){
    //   $this->id = $a["id"];
    //   $this->customerID = $a["customerID"];
    //   $this->weekID = $a["weekID"];
    //   $this->bonusPlayerID = $a["bonusPlayerID"]
    // }
  }
?>
