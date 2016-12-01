<?php
include "includes/conexion_bd.php";
session_start();
if(!isset($_SESSION['username']) || $_SESSION['tipo_usuario'] == 1){
    header('location:index.php');
}
// include "includes/login.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Administracion de Usuarios</title>
	<meta charset="utf-8">
	 <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'> 
	<link rel="stylesheet" href="css/style.css">

	<script type="text/javascript">
		function noCambiar(id) {

    		alert("Recuerda! no debías modificar el id. Asegurate que sea el  " + id);
		}

		
	</script>

</head>
<div class="encabezado">
			<div class="enc_1">
			<img src="img/logo1.png">
			</div>
			<div class="enc_2">
                <h1> <font face="Helvetica" COLOR="#0079BA">Bienvenido Administrador</font></h1>
            </div>
            <div class="enc_3">
                <font face="Helvetica" COLOR="#0079BA"><span ria-hidden="true"><H4>Administrador: <?php echo $_SESSION['username'];?></H4> </span></font>
            </div>
            
</div>
<body>
<h1>Administración de Usuarios</h1>
<div class="admin">
<div class=notas>
	<!--Estas notas están pensadas para los administradores, por lo tanto para gente que entiende el sistema en esta primera versión -->
		<p >RECUERDA:</p>
		<p > NO DEBES modificar el campo ID ni dar de baja a través de este formulario. </p>
		<p > El tipo de usuario debe ser 1 si es  "profesor" o 2 si es "administrador".</p>
	</div>

<?php 

extract($_REQUEST);

$usu_id_paso = $_REQUEST['usu_id'];


	//if (isset($usu_id_paso)) {

		$sql = "SELECT * FROM tbl_usuarios WHERE usu_id = $usu_id_paso";

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


//PROBLEMA: NO PUEDO DEJAR EL DISABLE TRUE PORQUE ENTONCES NO ME PASA EL VALUE

			echo "<form action='admin_usuarios_modifica.proc.php' method='post' class='formulario'>
				<input type='text' class='form_txt'name='usu_id' value='$usu_id'onchange='noCambiar(".$usu_id.")'>
				<input type='text' class='form_txt' name='usu_estado' placeholder='Estado' value='$usu_estado'>	
				<input type='text' class='form_txt' name='usu_usuario' placeholder='Usuario'value='$usu_usuario'>
				<input type='email' name='usu_mail' class='form_txt' placeholder='Email' value='$usu_mail'><br/><br/>
				<input type='text' class='form_txt' name='usu_nombre' placeholder='Nombre' value='$usu_nombre'>
				<input type='text' class='form_txt' name='usu_apellido1'  placeholder='Primer apellido' value='$usu_apellido1'>
				<input type='text' class='form_txt' name='usu_apellido2' placeholder='Segundo apellido' value='$usu_apellido2'>
				<input type='password' class='form_txt' name='usu_pwd' placeholder='Password' value='$usu_pwd'>
				<input type='text' class='form_txt' name='tipU_id' placeholder='Tipo' value='$tipU_id'><br/><br/>";

				echo "<input type='submit' class='log-btn' name='submit' value='Sólo quiero modificarlo'>";
	

?> 
</form>