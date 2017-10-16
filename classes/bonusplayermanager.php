<?php
class bonusplayermanager {
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function delete(BonusPlayer $bp){
        $stmt = $this->db->prepare("
            delete from BonusPlayer where id = :id
        ");

        return $stmt->execute([
            'id' => $bp->id,
        ]);
    }

    public function save(BonusPlayer $bp){
        if (isset($bonusPlayer->id)){
            return $this->update($bp);
        }

        $stmt = $this->db->prepare("
            insert into BonusPlayer (name, teamID)
            values(:name, :teamID)
        ");

        $r = $stmt->execute([
            'name'  => $bp->name,
            'teamID' => $bp->teamID,
        ]);
        $bp->id = $this->db->lastInsertId();
    }

    public function update(BonusPlayer $bp){
        $stmt = $this->db->prepare("
            update BonusPlayer set
                name = :name,
                teamID = :teamID
            where id = :id
        ");
        return $stmt->execute([
            'name'  => $bp->name,
            'teamID' => $bp->co,
            'id'    => $bp->id
        ]);
    }

    public function byPlayerID($teamID){
        $r = $this->db->query(
            "select id, name, teamID from BonusPlayer where teamID = :teamID"
        );

        $r->execute(['teamID' => $teamID]);

        $bonusPlayers = [];
        foreach ($r as $row){
            $bp = new bonusplayer();
            $bp->fromArray($row);
            $bonusPlayers[] = $bp;
        }

        return $bonusPlayers;
    }

    public function byPlayerName($name){

          //  $punditsBonusPlayerID = 23;
            $r = $this->db->prepare(
                 "select id from BonusPlayer where name = :name"
             );
             $r->execute(['name' => $name]);


          // $punditsBonusPlayerID = [];
          //   foreach ($r as $row) {
          //     $bp = new bonusplayer();
          //     $bp->fromArray($row);
          //     $punditsBonusPlayerID[]=$bp;
          //   }



            return $r->fetch()['id'];

            //return $punditsBonusPlayerID;
      }




  public function showAllOptions(){
    $players = [];
    $playerIDs = [];
    $r = $this->db->query(
      "select name from BonusPlayer order by name asc"
    );

    foreach ($r as $row) {
      array_push($players, $row['name']);
    }

    return $players;

  }

}

?>
