<?php
class Match {
  protected $db;
  public $id;

  public function __construct(\PDO $db = null){
      $this->db = $db;
  }

  public function setMatchesForWeek(array $matches){
    $week = $this->getLatestWeek();
    if ($week == null) {
      $week = 1;
    } else {
      $week ++;
    }
    $this->db->beginTransaction();
    foreach ($matches as $match){
      $stmt = $this->db->prepare("
          insert into
          Matchup ( homeTeamID,  awayTeamID, actualResult, weekID)
          values (:homeTeam_id, :awayTeam_id, TRUE, :week)
      ");
      $worked = $stmt->execute([
          'homeTeam_id' => $match['home'],
          'awayTeam_id' => $match['away'],
          'week' => $week
      ]);
      if (!$worked){
          $this->db->rollback();
          return false;
      }
    }
    return $this->db->commit();
  }

  public function setScoresForWeek(array $scores, array $fixtures) {
    $this->db->beginTransaction();
    for ($i=0; $i<6 ; $i++) {
      $stmt = $this->db->prepare("
          update
          Matchup
            set homeGoals = :home_goal,
                awayGoals = :away_goal
          where (homeTeamID = :homeid and awayTeamID = :awayid and actualResult = TRUE)
      ");
      $worked = $stmt->execute([
          'home_goal' => $scores['home'.$i],
          'away_goal' => $scores['away'.$i],
          'homeid' => $fixtures[$i]['homeTeamID'],
          'awayid' => $fixtures[$i]['awayTeamID'],
      ]);
      if (!$worked){
          $this->db->rollback();
          return false;
      }
    }
  }

  public function setGuessForTheWeek($homeid, $awayid, $homegoals, $awaygoals, $week){
    if ($week == null) {
      $week = 1;
    } else {
      $week ++;
    }
    $this->db->beginTransaction();
    $stmt = $this->db->prepare("
        insert into
        Matchup (homeTeamID, awayTeamID, homeGoals,  awayGoals, weekID)
        values (:homeID, :awayID, :homeGoals, :awayGoals, :week)
    ");
    $worked = $stmt->execute([
        'homeID' => $homeid,
        'awayID' => $awayid,
        'homeGoals' => $homegoals,
        'awayGoals' =>$awaygoals,
        'week' => $week
    ]);
    if (!$worked){
        $this->db->rollback();
        return false;
    }
    $this->id = $this->db->lastInsertId();
    return $this->db->commit();
  }

  public function getLatestWeek(){
    $s = $this->db->prepare("
      select weekID from Matchup
      where actualResult = TRUE
      order by id desc limit 1
    ");
    $s->execute();
    $row = $s->fetchAll();
    if (!$row){
      return null;
    }
    return $row[0][weekID];
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
