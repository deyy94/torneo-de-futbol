<?php SESSION_START();  ?>
<?php
if(!$user = $_SESSION['user'])
{
 header('Location: ../Players/login/index.php');
}
?>
<?php
  require "../bd/bd.php";
  require "../lib/pdf/mpdf.php";


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rol de juego</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
  </head>
  <body>
    <nav>
   <div class="nav-wrapper blue">
     <a href="../" class="brand-logo">inicio</a>
   </div>
 </nav>
 <div class="row">
 </div>
 <div class="row">

<div class="col s5">
</div>
<div class="cols2">


<form class="" action="?CreateRoll=on" method="post">
  <button class="waves-effect waves-light btn" type="submit" name="button">Crear Rol</button>
</form>
</div>
<div class="col s5">
</div>
 </div>
<?php

  $arrayTeams = array();
  $arrayVs = array();
  $create = "";
  if ( $_GET) {
    $create =  $_GET['CreateRoll'];

  }
  if ($create == 'on') {
  if($result = $mysqli->query("SELECT teamName from tc_teams")){
    $number=0;
    while ($row = $result->fetch_row()) {
      $arrayTeams[$number] = $row[0];
      $number+=1;
    }
  }

if (sizeof($arrayTeams)%2 == 0) {
        $numerador=0;

      for ($i=0; $i < count($arrayTeams) ; $i++) {
        $array=count($arrayTeams)-1;
        if ($arrayTeams[$i] == $arrayTeams[$array]) {
          break;
        }
          $arrayVs[$i] = $arrayTeams[$i]." vs ".$arrayTeams[$array]."<br>";
          $array-=1;

      }

      $mpdf = new mPDF('c', 'A4');
      $mpdf->writeHTML("Rol de juegos del torneo CIMOR");
      for ($i=0; $i < count($arrayVs) ; $i++) {
      $mpdf->writeHTML($arrayVs[$i]);
      }
      $mpdf->output('Rol_de_juego.pdf','I');


    }
    else {
      echo "No se cuenta con los equipos necesarios para realizar el torneo";
    }



}
$mysqli->close();
 ?>
 <script src="../Jquery/jquery-3.2.1.js" charset="utf-8"></script>
 <script src="" charset="utf-8"></script>
 </script>
  </body>
</html>
