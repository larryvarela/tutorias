<?php 
session_start();
$NumCon=$_POST['control'];
$Pass=$_POST['pass'];

$_SESSION['control'] =$NumCon;



$conexion=mysqli_connect("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
$consulta="SELECT * FROM docentes WHERE usuario = '$NumCon' and contrasena = '$Pass'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);


if($filas){     
    header("location:Tutorados.php");   
}else{
   
   header("location:loginT.php?error=true");

    
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>