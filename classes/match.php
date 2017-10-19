<?php
class Match {
  protected $db;
  private $id;

  public function __construct(\PDO $db = null){
      $this->db = $db;
  }

  public function setMatchesForWeek(array $matches){
    $this->db->beginTransaction();
    foreach ($matches as $match){
      $stmt = $this->db->prepare("
          insert into
          Matchup ( homeTeamID,  awayTeamID, actualResult)
          values      (:homeTeam_id, :awayTeam_id, TRUE)
      ");
      $worked = $stmt->execute([
          'homeTeam_id' => $match['home'],
          'awayTeam_id' => $match['away']
      ]);
      if (!$worked){
          $this->db->rollback();
          return false;
      }
    }
    return $this->db->commit();
  }

  public function setScoresForWeek() {
    $this->db->beginTransaction();
    // insert home and away team goals where actualResult == 1
    // and homeTeamID == x and awayTeamID == y
  }

  public function getMatchesForWeek(){
    $s = $this->db->prepare("
      select * from (
        select
          id, homeTeamID, awayTeamID
        from Matchup
        where actualResult = TRUE
        order by id desc limit 6
        )sub
      ORDER BY id ASC
    ");
    $s->execute();
    $row = $s->fetchAll();
    if (!$row){
        return null;
    }
    //var_dump($row);
    return $row;
  }
}
?>
