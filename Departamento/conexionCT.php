<?php
	$usuario = "root";
	$password = "";
	$servidor = "localhost";
	$basededatos = "bd_tutorias";
	$conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
    
?>