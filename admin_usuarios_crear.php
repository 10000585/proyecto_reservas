<?php
include "includes/conexion_bd.php";
session_start();
//Ahora la comprobación se hace mediante el tipo de usuario y no la categoría
/*if(!isset($_SESSION['username']) || $_SESSION['categoria'] == 'administrador'){
	header('location:index.php');
}
*/
if(!isset($_SESSION['username']) || $_SESSION['tipo_usuario'] == 1){
	header('location:index.php');
}

		extract($_REQUEST);

/*
He decidido que todo lo introducido debe estar en minúsculas, para unificar la base de datos. 
Utilizo la función strtolower de php
*/
		$usu_nombre = strtolower($usu_nombre);
		$usu_apellido1 = strtolower($usu_apellido1);
		$usu_apellido2 = strtolower($usu_apellido2);
		$usu_pwd= strtolower($usu_pwd);
		$usu_mail = strtolower($usu_mail);
		$usu_estado =strtolower($usu_estado);
		$usu_usuario = $usu_nombre.'.'.$usu_apellido1;
		$usu_mail = $usu_usuario.'@fje.edu';

		

		$sql= mysqli_query($conexion, "INSERT INTO tbl_usuarios (usu_usuario, usu_nombre, usu_apellido1, usu_apellido2, usu_pwd, usu_mail, usu_estado, tipU_id) VALUES ('$usu_usuario', '$usu_nombre' , '$usu_apellido1', '$usu_apellido2', '$usu_pwd', '$usu_mail', 'alta', '$tipU_id')");

		header('location: admin_usuarios.php');

?>