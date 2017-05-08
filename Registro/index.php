<?php SESSION_START();  ?>
<?php
if(!$user = $_SESSION['user'])
{
 header('Location: ../Players/login/index.php');
}
?>
<?php
require "../bd/bd.php";

$teamName = $_POST['teamName'];
$president = $_POST['president'];
$teamDT = $_POST['teamDT'];
$numberPlayers = $_POST['playersNumber'];

$namePlayer=$_POST['namePlayer'];
$playerPosition=$_POST['playerPosition'];
$playerEdad=$_POST['playerAge'];
$playerApodo=$_POST['playerAp'];

if(!$result = $mysqli->query("SELECT teamName,president,dt_name from tc_teams where teamName = '$teamName' and president = '$president' and dt_name = '$teamDT'")){
  while ($row = $result->fetch_assoc()) {
    if ($row["teamName"] == $teamName) {
      echo "El equipo ya esta registrado con ese nombre";
    }
     if($row["president"] == $president){
      echo "El nombre del presidente ya esta registrado ";
    }
     if ($row["dt_name"] == $teamDT) {
      echo "El nombre del director tecnico ya esta registrado";
    }

    }

} else {
  if ( !$mysqli->query("INSERT INTO tc_teams (teamName,president,dt_name) VALUES ('$teamName','$president','$teamDT') ")) {
   echo "Insert failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }
}

if ($result = $mysqli->query("SELECT name,teamName from tb_dt where name = '$teamDT' and teamName = $teamName"))
{
    while ($row = $result->fetch_assoc())
    {
      if ($row["name"] == $teamDT && $row["teamName"] == $teamName) {
        echo "El director tecnico ya esta registrado con otro equipo";
      }
    }

}else{
  if(!$mysqli->query("INSERT INTO tb_dt (name,teamName) VALUES ('$teamDT','$teamName')")){
    echo "Insert failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }
}


for ($i=0; $i <=$numberPlayers ; $i++) {

  if(!$result = $mysqli->query("SELECT fullName,teamName from tb_players where fullName = '$namePlayer[$i]' and teamName = '$teamName[$i]'")){
    echo "Entre una vez";
    while ($row = $result->fetch_assoc()) {
        echo $row["fullName"]." ya esta registrado en el equipo ".$row["teamName"];

    }

  }else{
    if ($mysqli->query("INSERT INTO tb_players (fullName,position,age,apodo,teamName) VALUES ('$namePlayer[$i]','$playerPosition[$i]','$playerEdad[$i]','$playerApodo[$i]','$teamName')"))
    {
      echo "jugadores insertados";
    }else{

      echo "Insert failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    }
$mysqli->close();
}

 ?>
