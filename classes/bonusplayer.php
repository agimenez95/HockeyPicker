<?php
class BonusPlayer {
  public $id;
  public $name;
  public $teamID;

  public function __construct($name = null, $teamID = null){
    $this->name = $name;
    $this->teamID = $teamID;
  }

  public function fromArray(array $a){
    $this->id = $a["id"];
    $this->name = $a["name"];
    $this->teamID = $a["teamID"];
  }
}
?>
