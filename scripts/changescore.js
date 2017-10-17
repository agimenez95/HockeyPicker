function changeScore(team, gameid, action) {
  let score = parseInt(document.getElementById(team+gameid).innerHTML);
  if (score >= 0 && score <= 10) {
    if (action === '+' && score != 10) {
      score += 1;
    } else if (action === '-' && score != 0) {
      score -= 1;
    }
    document.getElementById(team+gameid).innerHTML = score;
    document.getElementsByName(team+gameid).value = score;
    //console.log(document.getElementsByName(team+gameid).value);
  }
}
