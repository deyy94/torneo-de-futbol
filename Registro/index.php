<?php
require "bd.php";

$teamName = $_POST['teamName'];
$president = $_POST['president'];
$teamDT = $_POST['teamDT'];
$numberPlayers = $_POST['playersNumber'];

$namePlayer=$_POST['namePlayer'];
$playerPosition=$_POST['playerPosition'];
$playerEdad=$_POST['playerAge'];
$playerApodo=$_POST['playerAp'];

if ( !$mysqli->query("INSERT INTO tc_teams (name,president,dt_name) VALUES ('$teamName','$president','$teamDT') ")) {
 echo "Insert failed: (" . $mysqli->errno . ") " . $mysqli->error;
}else if(!$mysqli->query("INSERT INTO tb_dt (name,team) VALUES ('$teamDT','$teamName')")){
 echo "Insert failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

for ($i=0; $i < $numberPlayers ; $i++) {
if (!$mysqli->query("INSERT INTO tb_players (fullName,position,age,apodo,team) VALUES ('$namePlayer[$i]','$playerPosition[$i]','$playerEdad[$i]','$playerApodo[$i]','$teamName[$i]')")
  {
echo "fallo la insercion".$namePlayer;
  }

}
 ?>
