<?php
    include 'conexionCT.php';
        //recuperar las variables
        $contra1=$_POST['contra1'];
        $usuario=$_POST['usuario'];
        $contra2=$_POST['contra2'];
        $contra3=$_POST['contra3'];

        $consulta = "SELECT contrasena FROM jefe_departamento";
        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

        if (mysqli_num_rows($resultado) > 0) {
            while($row = mysqli_fetch_assoc($resultado)) {
             $contra = $row["contrasena"];
              }    
        }
        else {
            echo "0 results";
          }
if($contra == $contra1){

if($contra2 == $contra3 ){
    $sql = "UPDATE jefe_departamento SET usuario = '$usuario', contrasena = '$contra2' WHERE jefe_departamento.id_jefe_departamento = 1;";
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
        header ("Location: ActualizarUS.php?error=true");
      
    }else{
        header ("Location: ActualizarUS.php");
    }
    //CONFIRMAR CONTRASEÑA
}else{
    header ("Location: ActualizarUS.php?error=true");
}
 //CONFIRMA CONTRASEÑA ANTIGUA   
}else{
    header ("Location: ActualizarUS.php?error=true");
}
?>﻿