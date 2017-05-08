<?php SESSION_START();  ?>
<?php
if(!$user = $_SESSION['user'])
{
 header('Location: ../Players/login/index.php');
}
?>
<?php
include "../bd/bd.php";
$teamName = $_POST['teamName'];
$update = $_POST['update'];
$delete = $_POST['delete'];
if ($update == "update") {
    if($result = $mysqli->query(" UPDATE tb_players SET fullName = '".$_POST['name']."',position='".$_POST['pos']."',age='".$_POST['edad']."',apodo = '".$_POST['apodo']."' WHERE pk_player = '".$_POST['pk']."'")){
    }
}
if($delete == "delete"){
  $sql = "DELETE FROM tb_players WHERE pk_player='".$_POST['pk']."'";
    if(!$result = $mysqli->query($sql))
    {
      echo "error eliminando";
    }
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Plantilla de equipo</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
  </head>
  <body>
    <nav>
   <div class="nav-wrapper blue">
     <a href="../" class="brand-logo">inicio</a>
   </div>
 </nav>
    <table>

         <tr>
             <th>Nombre del equipo</th>
             <th>Presidente del equipo</th>
             <th>Director tecnico</th>
         </tr>

       <tbody>
    <?php


      if($result = $mysqli->query("SELECT teamName,president,dt_name from tc_teams where teamName ='$teamName'")){
        while ($row = $result->fetch_assoc())
        {
            echo "<tr> <td>".$row['teamName']."</td><td>". $row['president']."</td><td>".$row["dt_name"]."</td></tr>";
        }
      } else {
        echo "error: (" . $mysqli->errno . ") " . $mysqli->error;
      }
     ?>
   </tbody>
    </table>
    <span>Plantilla de jugadores</span>
    <table>
       <thead>
         <tr>
             <th>Nombre del jugador</th>
             <th>Equipo</th>
             <th>Posición de juego</th>
             <th>Edad</th>
             <th>Apodo</th>
         </tr>
       </thead>
       <tbody>
         <?php


           if($result = $mysqli->query("SELECT pk_player,fullName,position,age,apodo,teamName from tb_players where teamName ='$teamName'")){
             $modalNum=0;
             while ($row = $result->fetch_assoc())
             {
                 echo "<tr>
                 <td>".$row['fullName']."</td>
                 <td>".$row['teamName']."</td>
                 <td>".$row['position']."</td>
                 <td>".$row['age']."</td>
                 <td>".$row['apodo']."</td>
                 <td> <a class='waves-effect waves-light btn' href='#modal".$modalNum."'>Actualizar información</a></td>
                 <td><form action='' method='post'>
                    <input type='hidden' name='pk' value='".$row['pk_player']."'>
                    <input type='hidden' name='teamName' value='".$row['teamName']."'>
                    <input type='hidden' name='update' value='0'>
                    <input type='hidden' name='delete' value='delete'>
                      <button type='submit'class='modal-action modal-close waves-effect waves-green btn-flat red' name='button'>Eliminar</button>
                 </form></td>
                 </tr>
                 <form class='' action='' method='post'>
                 <div id='modal".$modalNum."' class='modal bottom-sheet'>
                 <div class='modal-content'>
                  <h4>".$row['fullName']."</h4>
                  <div class='row'>
                    <form class='col s12'>
               <div class='row'>
                 <div class='input-field col s6'>
                 <input type='hidden' name='update' value='update'>
                 <input type='hidden' name='pk' value='".$row['pk_player']."'>
                  <input type='hidden' name='teamName' value='".$row['teamName']."'>
                   <input placeholder='Placeholder' id='' name='name' type='text' class='validate' value=".$row['fullName'].">
                   <label for='first_name'>Nombre del jugador</label>
                 </div>
                 <div class='input-field col s6'>
                   <input placeholder='Placeholder' id='' name='pos' type='text' class='validate' value=".$row['position'].">
                   <label for='first_name'>Posicion de juego</label>
                 </div>
                 <div class='input-field col s6'>
                   <input placeholder='Placeholder' id='' name='edad' type='text' class='validate' value=".$row['age'].">
                   <label for='first_name'>Edad</label>
                 </div>
                 <div class='input-field col s6'>
                   <input placeholder='Placeholder' id='' name='apodo' type='text' class='validate' value=".$row['apodo'].">
                   <label for='first_name'>Apodo</label>
                 </div>
               </div>
                 <form>
               </div>
                  </div>
                  <div class='modal-footer'>
                  <button type='submit'class='modal-action modal-close waves-effect waves-green btn-flat' name='button'>Actualizar información</button>

                  </div>
                  </div>
                  </form>";
                  $modalNum+=1;
             }
           } else {
             echo "error: (" . $mysqli->errno . ") " . $mysqli->error;
           }
           $mysqli->close();
          ?>

        </tbody>
         </table>


     <script src="../Jquery../jquery-3.2.1.js" charset="utf-8"></script>
     <script src="../js/materialize.min.js" charset="utf-8"></script>
     <script type="text/javascript">

     $(document).ready(function(){

       $('.modal').modal();
     });
     </script>
  </body>
</html>
