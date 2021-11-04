<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="../css/estiloD.css">
  </head>

<body>

  <header class="navbar navbar-dark bg-dark navbar-expand-md">
    <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="gestionarTutores.php" class="nav-link">AGREGAR TUTORES</a></li>
            <li class="nav-item"><a href="#" class="nav-link">ELIMINAR TUTORES</a></li>
            <li class="nav-item"><a href="#" class="nav-link">ACTUALIZAR TUTORES</a></li>
            <li class="nav-item"><a href="GestionarUsuarios.html" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    <main>   
      <h2 class ="titulo">REGISTRAR TUTOR</h2>
      <form action="guardarT.php" method="POST">  
      <div class = "IncioSnecio">
       
      <label>Nombre</label>
      <input name = "firstname" class = "NC" type = "text" placeholder="Nombre Completo">
  
      <label>Apellido Paterno</label>
      <input name = "lasttname" class = "NC" type = "text" placeholder="Apellido Paterno">
  
      <label>Apellido Materno</label>
      <input name = "lastname2" class = "NC" type = "text" placeholder="Apellido Materno">
      
      </div>
  
      <div class = "grupos/carreras">
          <Label>Grupo</Label>
          <?php
          include 'conexionCT.php';
          $consulta = "SELECT * FROM grupos";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          echo "<select required name = 'grupos'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
              echo "<option value='". $columna['nombre_grupo']."'>";
              echo $columna['nombre_grupo'];
              echo "</option>";      
          }
          echo "<select>";
          mysqli_close( $conexion );
          ?>
  
          <Label>Carrera</Label>
          <?php
          include 'conexionCT.php';
          $consulta = "SELECT * FROM carreras";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          echo "<select required name = 'carreras'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
             
              echo "<option value='". $columna['siglas']."'>";
              echo $columna['siglas'];
              echo "</option>";      
          }
          echo "<select>";
          mysqli_close( $conexion );
          ?>
  
    
         <div class = "rutas">
          <div class = "buton"><button type="submit">REGISTRAR</button></div>
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
  </div>
  </body>
  </html>