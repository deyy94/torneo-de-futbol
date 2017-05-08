<?php
require "../bd/bd.php";

$usr = $_POST['uname'];
$pwd = $_POST['psw'];

$encript = encrypt($pwd,$pwd);

$resultado = $mysqli->query("CALL login('$usr','$pwd')");
$fila = mysqli_fetch_row($resultado);
 if($usr== $fila[1] && $pwd==$fila[2]){
    SESSION_START();
    $_SESSION['user']=$usr;
     header('Location: ../');
 }else {
    header('Location: index.php');
 }
 $mysqli->close();

  function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}





 ?>
