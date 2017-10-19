function changeScore(team, gameid, action) {
  let score = parseInt(document.getElementById(team+gameid).innerHTML);
  if (score >= 0 && score <= 10) {
    if (action === '+' && score != 10) {
      score += 1;
    } else if (action === '-' && score != 0) {
      score -= 1;
    }
    document.getElementById(team+gameid).innerHTML = score;
    var elems = document.getElementsByName("formName")[0].getElementsByTagName("input");
    for(var i = 0; i < elems.length; i++) {
      var string = toString(team+gameid);
      if(elems[i].name === team+gameid){
        elems[i].setAttribute("value", document.getElementById(team+gameid).innerHTML);
      }
    }
  }
}
