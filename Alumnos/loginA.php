<?php include("conexionA.php"); ?>
<?php 
session_start();
$txtUser=(isset($_POST['txtUser']))?$_POST['txtUser']:"";
$txtPass=(isset($_POST['txtPass']))?$_POST['txtPass']:"";
$btnlogin=(isset($_POST['btnlogin']))?$_POST['btnlogin']:"";
?>
<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loginA</title>
    <link rel="stylesheet" href="../css/Alumno/estiloA.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
</head>
<body>
    <header class = "barraTareas">
        <div class = "logo">
        <img src ="../Imagenes/Incio/Icono4.png" alt ="Icono2" width="200">
        </div> 

        <h2>Instituto Tecnologico de Tepic</h2>

        <div class = "logo2">   
        <a href="../index.html">Regresar</a>
        <img src ="../Imagenes/Incio/Icono2.png" alt ="Icono2" width="200">
        </div>    
       </header> 

    <main>   
    <h2 class ="titulo">Inicar Sesion</h2>

    <div class = "IncioSnecio">
    <label>Numero de Control</label>
    <input class = "NC" type = "text" placeholder="No. Control">
    <br>
    <br>
    <label>Contraseña </label>
    <input class = "NC" type = "password" placeholder="contraseña">
    <br>
    <br>
    </div>

       <div class = "rutas">
        <div class = "buton"><button style="margin-right: 10px" onclick="location.href='Alumno.php'" >INGRESAR</button></div>
        <div class = "buton"><button style="margin-left: 10px" onclick="location.href='../index.html'" >CANCELAR</button></div>
      </div>

        <a class = "RC" style="margin-top: 10px" href="#">Recuperar Contraseña</a>

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
</div>
</body>
</html>