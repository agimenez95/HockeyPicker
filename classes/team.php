<?php
class Team {
  private $pdo;
  private $id;
  private $name;

  public function __construct(PDO $db = null) {
    $this->db = $db;
  }

  public function fromArray($a){
    $this->id = $a['id'];
    $this->name = $a['name'];
  }

  public function getID(){
    return $this->id;
  }

  public function getName(){
    return $this->name;
  }
}
?>
