<?php
class CustomerManager {
  private $db;

  public function __construct(PDO $db){
    $this->db = $db;
  }

  public function byId($id){
    $s = $this->db->prepare("
      select
          id, username, pword, firstname, surname, DOB, email, teamSupport, datestarted
      from Customer
      where id = :id
    ");
    $s->execute(['id' => $id]);
    $row = $s->fetch();
    if (!$row){
        return null;
    }
    $cust = new Customer($this->db);
    $cust->fromArray($row);
    return $cust;
  }

  public function byUsername($username){
    $s = $this->db->prepare("
          select
              id, username, pword, firstname, surname, DOB, email, teamSupport, datestarted
          from Customer
          where username = :username
    ");
    $s->execute(['username' => $username]);
    $row = $s->fetch();
    if (!$row){
        return null;
    }
    $cust = new Customer($this->db);
    $cust->fromArray($row);
    return $cust;
  }

  public function save(Customer $cust){
    $this->db->beginTransaction();
    $r = $this->db->prepare("
        insert into Customer (firstname, surname, username, DOB, dateStarted, pword, teamSupport, email)
        values (:firstname, :surname, :username, :dob, now(), :pword, :teamSupport, :email)
    ");
    $worked = $r->execute(
      ['firstname' => $cust->getFirstname(),
       'surname' => $cust->getSurname(),
       'username' => $cust->getUsername(),
       'dob' => $cust->getDOB(),
       'pword' => $cust->getPword(),
       'teamSupport' => $cust->getTeamSupport(),
       'email' => $cust->getEmail()]
    );
    if (!$worked) {
      echo "hello";
      return false;
    }
    $this->db->commit();
    $cust->setID($this->db->lastInsertId());

    return true;
  }
}
?>
