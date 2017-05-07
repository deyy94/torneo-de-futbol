<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rol de juegos</title>
  </head>
  <body>
    <h1>Registro de equipos</h1>
    <form class="" action="Registro/" method="post">

      <div class="canvas">



      <span>Nombre del equipo:</span><input type="text" name="teamName" value=""><br>
      <span>Logo del equipo</span><input type="file" name="file" value="Logo"><br>
      <span>Presidente del equipo:</span><input type="text" name="president" value=""><br>
      <span>Nombre del director tecnico:</span><input type="text" name="teamDT" value=""><br>
      
    <br>
          <span>Jugadores:</span><br><br>
      <span>Nombre Completo:</span><input type="text" name="namePlayer[]" value=""> <br>
      <span>Posición:</span><input type="text" name="playerPosition[]" value=""> <br>
      <span>Edad:</span><input type="text" name="playerAge[]" value=""> <br>
      <span>Apodo:</span><input type="text" name="playerAp[]" value=""><br><br>
      <input type="hidden" id="pN" name="playersNumber" value="0">

      </div>
      <input type="button" id="add" name="add" value="Añade mas jugadores"> <br>
      <input type="submit" id="submit" name="submit" value="Registrar equipo">
    </form>
    <script src="Jquery/jquery-3.2.1.js" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        var numerador = 0;
        numerador = parseInt( $("#pN").val());
        $( "#add" ).click(function() {
          numerador+=1;
          console.log(numerador);
          $(".canvas").append( "<span>Nombre Completo:</span><input type='text' name='namePlayer[]' value=''> <br> <span>Posición:</span><input type='text' name='playerPosition[]' value=''> <br> <span>Edad:</span><input type='text' name='playerAge[]' value=''  > <br><span>Apodo:</span><input type='text' name='playerAp[]' value=''><br><br>" );
          $("#pN").val(numerador);
        });
        $( "#submit" ).click(function() {
          if(numerador < 11){
            alert("Su equipo no tiene los suficientes jugadores");
            return false;
          }
          else {
            return true;
          }
        });
});

    </script>
  </body>
</html>
