<?php SESSION_START();  ?>
<?php
if(!$user = $_SESSION['user'])
{
 header('Location: ../Players/login/index.php');
}
if (!empty($_GET['destroy'])) {
  $destroy=$_GET['destroy'];
  if ($destroy==1) {
    session_destroy();
    session_unset();
    header('Location: index.php');
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rol de juegos</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  </head>
  <body>
    <nav>
   <div class="nav-wrapper blue">
     <a href="../" class="brand-logo"></a>
   </div>
 </nav>
<div class="row">

  <div class="col s4">
    <a class="waves-effect waves-light btn" href="Equipos/ ">Ver equipos</a>
  </div>
  <div class="col s4">
    <a class="waves-effect waves-light btn" href="Rol/">Rol de juego</a>
  </div>
  <div class="col s4">
    <a class="waves-effect waves-light btn red" href="/Players/?destroy=1">Cerrar Sesión</a>
  </div>



          </div>
<div class="row">

  <div class="col s1">

  </div>
  <div class="col s10">
    <h1>Registro de equipos</h1>
    <form class="" action="Registro/" method="post">

      <div class="canvas">



      <span>Nombre del equipo:</span><input type="text" class="validate" name="teamName" value="" required><br>
      <span>Presidente del equipo:</span><input type="text" class="validate" name="president" value="" required><br>
      <span>Nombre del director tecnico:</span><input type="text" class="validate" name="teamDT" value="" required><br>

    <br>
          <span>Jugadores:</span><br><br>
      <span>Nombre Completo:</span><input type="text" class="validate" name="namePlayer[]" value="" required> <br>
      <span>Posición:</span><input type="text" class="validate" name="playerPosition[]" value="" required> <br>
      <span>Edad:</span><input type="text" class="validate" name="playerAge[]" value="" required> <br>
      <span>Apodo:</span><input type="text" class="validate" name="playerAp[]" value="" required><br><br>
      <input type="hidden" id="pN" name="playersNumber" value="0">

      </div>
      <div class="row">
        <div class="col s6">
          <input class="waves-effect waves-light btn" type="button" id="add" name="add" value="Añade mas jugadores">
        </div>
      <div class="col s6">
        <input class="waves-effect waves-light btn" type="submit" id="submit" name="submit" value="Registrar equipo">
      </div>
        </div>
    </form>
  </div>
    <div class="col s1">

    </div>
    </div>
    <script src="Jquery/jquery-3.2.1.js" charset="utf-8"></script>
       <script src="js/materialize.min.js" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        var numerador = 0;
        numerador = parseInt( $("#pN").val());
        $( "#add" ).click(function() {
          numerador+=1;
          console.log(numerador);
          $(".canvas").append( "<span>Nombre Completo:</span><input type='text' name='namePlayer[]' value='' required> <br> <span>Posición:</span><input type='text' name='playerPosition[]' value='' required> <br> <span>Edad:</span><input type='text' name='playerAge[]' value=''   required> <br><span>Apodo:</span><input type='text' name='playerAp[]' value='' required><br><br>" );
          $("#pN").val(numerador);
        });
        $( "#submit" ).click(function() {
        /*  if(numerador < 11){
            alert("Su equipo no tiene los suficientes jugadores");
            return false;
          }
          else {
            return true;
          }*/
        });
});

    </script>
  </body>
</html>
