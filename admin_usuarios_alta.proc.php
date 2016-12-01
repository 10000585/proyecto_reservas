<?php
include "includes/conexion_bd.php";
session_start();
//Ahora la comprobación se hace mediante el tipo de usuario y no la categoría
if(!isset($_SESSION['username']) || $_SESSION['tipo_usuario'] == 1){
	header('location:index.php');
}


		extract($_REQUEST);

		echo $usu_id;

		$sql = "SELECT * FROM tbl_usuarios WHERE usu_id = '$usu_id'";

		echo $sql;

		$usuarios = mysqli_query($conexion, $sql);

		$usuario = mysqli_fetch_array($usuarios); 

			$usu_id = $usuario['usu_id'];
			$usu_usuario = $usuario['usu_usuario'];
			$usu_nombre = $usuario['usu_nombre'];
			$usu_apellido1 = $usuario['usu_apellido1'];
			$usu_apellido2 = $usuario['usu_apellido2'];
			$usu_pwd = $usuario['usu_pwd'];
			$usu_mail = $usuario['usu_mail'];
			$usu_estado = $usuario['usu_estado'];
			$usu_usuario = $usuario['usu_usuario'];
			$tipU_id =	$usuario['tipU_id'];
/*
		echo $usu_estado;
		echo $usu_nombre;
		echo $usu_apellido1;
		echo $usu_apellido2;
		echo $usu_pwd;
		echo $usu_mail;
		echo $usu_usuario;
		echo $tipU_id;

*/


		$usu_nombre = strtolower($usu_nombre);
		$usu_apellido1 = strtolower($usu_apellido1);
		$usu_apellido2 = strtolower($usu_apellido2);
		$usu_pwd= strtolower($usu_pwd);
		$usu_mail = strtolower($usu_mail);
		$usu_usuario = strtolower($usu_usuario);
		


		

		$sql= mysqli_query($conexion, "UPDATE tbl_usuarios SET usu_estado = 'alta' WHERE usu_id = '$usu_id'");
	



		header('location: admin_usuarios.php');

?>