<?php 
$NumCon=$_POST['control'];
$Pass=$_POST['pass'];
session_start();
$_SESSION['control']=$NumCon;


$conexion=mysqli_connect("localhost","root","","bd_tutorias");
$consulta="SELECT * FROM jefe_departamento WHERE ususario = '$NumCon' and contraseña = '$Pass'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

if($filas){     
    header("location:Departamento.php?numero=$NumCon");   
}else{
   
   header("location:loginD.php?error=true");

    
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>