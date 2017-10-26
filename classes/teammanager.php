<?php
class TeamManager {
  private $pdo;

  public function __construct(PDO $db = null) {
    $this->db = $db;
  }

  public function byId($id){
    $s = $this->db->prepare("
      select
          id, name
      from Teams
      where id = :id
    ");
    $s->execute(['id' => $id]);
    $row = $s->fetch();
    if (!$row){
        return null;
    }
    $team = new Team($this->db);
    $team->fromArray($row);
    return $team;
  }


  public function showAllOptions(){
    $teams = [];
    $teamID = [];
    $r = $this->db->query(
      "select id, name from Teams order by name asc"
    );

    foreach ($r as $row) {
      //array_push($teams, $row['name']);
      $teams[$row['id']] = $row['name'];
    }

    return $teams;
    //return $r;
  }
}
?>
