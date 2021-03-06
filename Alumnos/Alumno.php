<?php 
session_start();
$NumCon=$_SESSION['control'];

?>
<?php
    require "conexionA.php";

    $alumno=$NumCon;
    $conexionA = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
    if($conexionA->connect_errno){
        echo "Error de conexion de la base datos".$conexionA->connect_error;
        exit();
    }

    $id_alumno = $conexion->query("SELECT id_alumnos from alumnos where numero_control = '$alumno'");
        $rowAl = $id_alumno->fetch_array();
        $idal = $rowAl['id_alumnos'];

    $sql = "SELECT * FROM asesorias;";
    $sql2 = "SELECT A.nombre, A.fecha, A.tipo_de_asesoria, S.status, S.fecha 
             FROM solicitudes S 
                INNER JOIN asesorias A 
                    ON(A.id_asesorias = S.fk_asesorias) WHERE fk_alumnos = '$idal';";
    $resultado = $conexionA->query($sql);
    $resultado2 = $conexionA->query($sql2);
?>
<!DOCTYPE html>
<html lang="estilo">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>

    <link rel="stylesheet" href="../css/Alumno/estiloA.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
</head>

<body>

    <header class="navbar navbar-dark bg-dark navbar-expand-md">
        <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="Alumno.php" class="nav-link">SOLICITUDES</a></li>
                <li class="nav-item"><a href="mensajes.php" class="nav-link">MENSAJES</a></li>
                <li class="nav-item"><a href="tieneTutor.php" class="nav-link">EXPEDIENTE</a></li>
                <li class="nav-item"><a href="CambiarDatos.php" class="nav-link">CAMBIAR DATOS</a></li>
                <li class="nav-item"><a href="cambiarContrase??a.php" class="nav-link">CAMBIAR CONTRASE??A</a></li>
                <li class="nav-item"><a href="loginA.php" class="nav-link">CERRAR SESI??N</a></li>
            </ul>
        </div>
        <a href="../index.html"><img src="../Imagenes/Incio/Icono4.png" alt="Icono2" width="250"></a>
    </header>
    <!--recibe numero de control-->


    <main>
        <h1 align="center">Asesorias</h1>
        <div align="center">
            <table width="70%" border="1px" align="center">

                <tr align="center">
                    <td>Nombre de asesoria</td>
                    <td>Fecha de inicio</td>
                    <td>Tipo de asesoria</td>
                    <td>Descripcion</td>
                </tr>
                <?php 
            while($datos=$resultado->fetch_array()){
        ?>
                <tr align="center">
                    <td><?php echo $datos["nombre"]?></td>
                    <td><?php echo $datos["fecha"]?></td>
                    <td><?php echo $datos["tipo_de_asesoria"]?></td>
                    <td><?php echo $datos["descripcion"]?></td>
                </tr>
                <?php   
        }

     ?>
            </table>
        </div>
        <h1 align="center">Solicitudes</h1>
        <div align="center">
            <table width="70%" border="1px" align="center">

                <tr align="center">
                    <td>Nombre de asesoria</td>
                    <td>Fecha de inicio</td>
                    <td>Tipo de asesoria</td>
                    <td>Estatus</td>
                    <td>Fecha solicitud</td>
                </tr>
                <?php 
        while($datos=$resultado2->fetch_array()){
        ?>
                <tr align="center">
                    <td><?php echo $datos[0]?></td>
                    <td><?php echo $datos[1]?></td>
                    <td><?php echo $datos[2]?></td>
                    <td><?php echo $datos[3]?></td>
                    <td><?php echo $datos[4]?></td>
                </tr>
                <?php   
        }

     ?>
            </table>
        </div>
        <h1 align="center">Realizar Solicitud</h1>
        <form action="" method='post' align="center">
            <?php
    if (isset($_POST['btnSolicitar'])){
        include 'conexionA.php';
        $fecha_actual = date('Y-m-d');
        $motivo = $conexion->real_escape_string($_POST['motivo']);
        $asesoriaE =  $conexion->real_escape_string($_POST['alumnos']);
        $id_alumno = $conexion->query("SELECT id_alumnos from alumnos where numero_control = '".$_SESSION['control']."'");
        $rowAl = $id_alumno->fetch_array();
        $id_asesoria = $conexion->query("SELECT id_asesorias from asesorias where nombre = '$asesoriaE'");
        $rowAs = $id_asesoria->fetch_array();
        $idal = $rowAl['id_alumnos'];
        $idas = $rowAs['id_asesorias'];
         
                $fk_docent = $conexion->query("SELECT fk_docentes from asignar_tutor where fk_alumno = '$idal'");
        $rowAx = $fk_docent->fetch_array();
        if (isset($rowAx['fk_docentes'])){
        $idax = $rowAx['fk_docentes'];
        } else { return 'No se te ha asignado un tutor';}
            $insercion = $conexion->query("INSERT into solicitudes (status,fecha,motivo,fk_alumnos,fk_docentes,fk_asesorias) Values ('Solicitada', '$fecha_actual', '$motivo', '$idal', $idax,'$idas')");
                if ($insercion) {echo "Se ha hecho la solicitud";}
                    else {
                        echo "No se ha podido realizar la solicitud";
                    }
            
            
        
    }
    ?>
            <?php
          include 'conexionA.php';
          $consulta = "SELECT * FROM asesorias";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          echo "<select required name='alumnos'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
             
              echo "<option value='". $columna['nombre']."'>";
              echo $columna['nombre'];
              echo "</option>";      
          }
          echo "<select>";
          mysqli_close( $conexion );
          ?>
            <br></br>

            <textarea name="motivo" rows="2" cols="50"
                placeholder="Detalla tus motivos de tu solicitud (Materia que solicitas o raz??n para ver al psicologo)"
                require></textarea>


            <br></br>
            <div class="buton">
                <button onclick="location.href='Alumno.php?numero=16401013&tipo=asesoria'"
                    name="btnSolicitar">SOLICITAR</button>

            </div>
        </form>
    </main>



    <footer>
        <div class=footerDatos>
            <h4>Instituto Tecnologico de Tepic</h4>
            <p>"Sabiduria Tecnologica #2595, Lagos del contry."</p>
            <p>(311) 211 9400</p>
            <p>Tepic, Nayarit. Mexico</p>
        </div>
    </footer>


    <img class="logo5" src="../Imagenes/Incio/Icono5.png" alt="Icono5" width="200">


</body>

</html>