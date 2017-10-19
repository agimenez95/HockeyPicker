<?php
class Customer {
  private $id;
  private $firstname;
  private $surname;
  private $username;
  private $dob;
  private $pword;
  private $email;
  private $teamSupport;
  private $db;

  public function __construct(PDO $db = null){
    $this->db = $db;
  }

  public function passwordValid($pword){
    return password_verify($pword, $this->pword);
  }

  public function fromArray($a){
    if(isset($a['id'])){
      $this->id = $a['id'];
    }
    $this->username = $a['username'];
    $this->pword = $a['pword'];
    $this->firstname = $a['firstname'];
    $this->surname = $a['surname'];
    $this->dob = $a['DOB'];
    $this->email = $a['email'];
    $this->teamSupport = $a['teamSupport'];
  }

  public function setID($id){
    $this->id = $id;
  }

  public function getID(){
    return $this->id;
  }

  public function getFirstname(){
    return $this->firstname;
  }

  public function getSurname(){
    return $this->surname;
  }

  public function getUsername(){
    return $this->username;
  }

  public function getDOB(){
    return $this->dob;
  }

  public function getPword(){
    return $this->pword;
  }

  public function setPword($pword){
    $this->pword = $pword;
  }

  public function getEmail(){
    return $this->email;
  }

  public function getTeamSupport(){
    return $this->teamSupport;
  }
}
?>
