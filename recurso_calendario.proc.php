<?php
include "includes/conexion_bd.php";
session_start();

if(!isset($_SESSION['username'])){
	header('location:index.php');
}


extract($_REQUEST);

$rec_id = $_REQUEST['rec_id'];
$usu_id = $_REQUEST['usu_id'];

$dia = $_POST['dia'];
echo $dia;

$mes = $_POST['mes'];
echo $mes;

echo $rec_id;
echo $usu_id;

//header('location: recurso_calendario.php');

/*$hora = $_POST['hora'];
echo $hora.":00";*/

 ?>