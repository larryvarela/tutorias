<?php 
session_start();
$NumCon=$_SESSION['usuario'];

?>
<?php
require "conexionC.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}else {

  if (empty($_SESSION['usuario'])) { 
     
  }else{
    $usuario = $NumCon; 
    $consulta="SELECT * FROM coordinador_de_tutorias WHERE usuario = '$usuario'";
    $resultado = $conexion->query($consulta);
    while($rows=$resultado->fetch_array()){
      $nombre = $rows[1];
      $apellidoM = $rows[2];
      $apellidoP = $rows[3];  
      $correo = $rows[4]; 
      $id = $rows[0];   
      }
  }
}
 
?>
<!DOCTYPE html>
<html lang="estilo"> 
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiza tus datos</title>
    
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estiloC.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body> 
 
<header class="navbar navbar-dark bg-dark navbar-expand-md">
  <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
  <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
      <span class="navbar-toggler-icon"></span> 
  </button>
  <div class="navbar-collapse collapse" id="navbar">
      <ul class="navbar-nav">
      <li class="nav-item"><a href="GestionarDatosC.html" class="nav-link">REGRESAR</a></li>
      </ul>
    </div>
    <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
  </header>



  <main class="mainLogin" style="justify-content: center; align-items:center;">   
    <div style="justify-content: center; align-items:center;">
      <form class="formulario" action="actualizaCT.php" method="POST">
        <h2 class ="titulo">Informaci??n personal</h2> 
        <div class="contenedor-form">
          <div class="input-contenedor">
            <input name = "name" id="name"  class = "NC" type = "text" placeholder="Nombre(s)"  value="<?php  echo "$nombre";?>">  
            <input name = "lastname" id="lastname" class = "NC" type = "text" placeholder="Apellido materno" value="<?php  echo "$apellidoM";?>" >
            <input name = "lastname2" id="lastname2" class = "NC" type = "text" placeholder="Apellido paterno" value="<?php  echo "$apellidoP";?>">

          </div>
        </div>      
        <div class = "rutas" style="margin-top: 10px">
          <div class = "buton"><button style="margin-right: 10px" type="submit" >ACTUALIZAR INFORMACI??N</button></div>
        </div>
      </form>
    
    </div>
    </main>
    



  <footer>
    <div class = footerDatos>     
    <h4>Instituto Tecnologico de Tepic</h4>
    <p>"Sabiduria Tecnologica #2595, Lagos del contry."</p>  
    <p>(311) 211 9400</p>
    <p>Tepic, Nayarit. Mexico</p>
    </div>
  </footer>


  <img class = "logo5" src ="../Imagenes/Incio/Icono5.png" alt ="Icono5" width="200">


</body>
</html>
