

<?php
include "includes/conexion_bd.php";
session_start();
if(!isset($_SESSION['username']) || $_SESSION['tipo_usuario'] == 1){
    header('location:index.php');
}
// include "includes/login.php";

$opcion_admin = $_POST['opciones_admin'];

switch ($opcion_admin) {
	case 'admin_usuarios':
		header('location:admin_usuarios.php');
		break;
	case 'reservar_recurso':
		echo "llefooooooo";
		header('location:recursos.php');
		break;
	case 'admin_incidencia':
		header('location:admin_administrar_incidencias.php');
		break;
	case 'revisar_estadistica':
		header('location:revisar_estadistica.php');
		break;
	case 'admin_reservas':
		header('location:admin_administrar_reservas.php');
		break;
	
	default:
		# code...
		break;
}

?>

