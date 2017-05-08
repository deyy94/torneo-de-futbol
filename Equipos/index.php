<?php SESSION_START();  ?>
<?php
if(!$user = $_SESSION['user'])
{
 header('Location: ../Players/login/index.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Equipos inscritos</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
  </head>
  <body>
    <nav>
   <div class="nav-wrapper blue">
     <a href="../" class="brand-logo">inicio</a>
   </div>
 </nav>
  
      <div class='row'>
    <?php
        require "../bd/bd.php";
        $name ="";
        if($result = $mysqli->query("SELECT teamName from tc_teams")){

          while ($row = $result->fetch_row()) {
            echo "

                <div class='col m3'>
                  <div class='card blue-grey darken-1'>
                    <div class='card-content white-text'>
                      <span class='card-title'>".$row[0]."</span>
                    </div>
                    <div class='card-action'>
                    <form action='../Plantilla/' method='post'>
                      <input type='hidden' name='teamName' value='$row[0]'>
                      <input type='hidden' name='update' value='0'>
                      <input type='hidden' name='delete' value='0'>
                      <input class='waves-effect waves-light btn' type='submit' value='Ver plantilla'>
                    </form>
                    </div>
                  </div>
                </div>

            ";
     }

        }
        echo $name;
        $mysqli->close();
     ?>
</div>
  </body>
</html>
