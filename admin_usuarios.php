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

	function modifica_usuario(id){
		window.location = 'admin_usuarios_modifica.php?&usu_id='+id;
	}

	function alta_usuario(id){
		window.location = 'admin_usuarios_alta.proc.php?&usu_id='+id;
	}

	function baja_usuario(id){
		window.location = 'admin_usuarios_baja.proc.php?&usu_id='+id;
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
		<p >Notas para la introducción de nuevos usuarios:</p>
		<p >Los campos "Autonumerico" , "Nombre usuario final", "Estado" y "Email" son autocompletados.</p>
		<p >El tipo de usuario puede ser 1 si es  "profesor" o 2 si es "administrador".</p>
	</div>
<form action="admin_usuarios_crear.php" method="post" id="crearUsuario" class="formulario">
	<input type="text" class="form_txt" id="id_usu" name="id_usu" placeholder="Autonumérico" disabled="true">
	<input type="text" class="form_txt" id="usu_estado" name="usu_estado" placeholder="Estado" disabled="true">	
	<input type="text" class="form_txt" id="usu_usuario" name="usu_usuario" placeholder="Nombre usuario final" disabled="true">
	<input type="email" name="usu_mail" id="usu_mail" class="form_txt" placeholder="mail" disabled="true"><br/><br/>
	<input type="text" class="form_txt" id="usu_nombre" name="usu_nombre"  placeholder="Nombre">
	<input type="text" class="form_txt" id="usu_apellido1" name="usu_apellido1"  placeholder="Primer Apellido">
	<input type="text" class="form_txt" id="usu_apellido2" name="usu_apellido2"  placeholder="Segundo Apellido">
	<input type="password" class="form_txt" id="usu_pwd" name="usu_pwd"  placeholder="Password">
	<input type="text" class="form_txt" id="tipU_id" name="tipU_id" placeholder="Tipo de usuario"><br/><br/>


<?php  
	$sql="SELECT usu_nombre, usu_apellido1, usu_apellido2 FROM tbl_usuarios";
	//echo "$sql";
	$usuario = mysqli_query($conexion, $sql);
	if(mysqli_num_rows($usuario)>0){
		while ($datos = mysqli_fetch_array($usuario)) {
			$usu_nombre=$datos['usu_nombre'];
			$usu_apellido1=$datos['usu_apellido1'];
			$usu_apellido2=$datos['usu_apellido2'];
			//if (!isset(var)) {}
				# code...
			
		}

	}else{

		echo "<input type='submit' class='log-btn1' name='submit' value='CREAR'>";
	}
?>
	<input type="submit" class="log-btn1" name="submit" value="CREAR"></input>


	<!-- COMO FUTURAS MEJORAS CREARÉ UN BOTÓN DE BUSQUEDA PARA ENCONTRAR UN USUARIO EN PARTICULAR -->
<!-- 	<input type="submit" class="log-btn1" name="submit" value="BUSCAR"></input>
 -->
</form>
<?php 
	
	extract($_REQUEST);

	$sql = "SELECT * FROM tbl_usuarios ORDER BY usu_id DESC";

	$usuarios = mysqli_query($conexion, $sql);

	//ECHO $sql;

	if (mysqli_num_rows($usuarios)>0) {
		echo "<table style='margin-bottom: 5px; margin-top: 5px'>";
		echo "</table>";
		echo "<table style='margin-bottom: 5px'>";
		echo "<th> Hay un total de ".mysqli_num_rows($usuarios)." registros en el sistema </th>";
		echo "</table>";



		echo "<table>

				<tr>
					<th></th>
					<th>Id</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Primer Apellido</th>
					<th>Segundo Apellido</th>
					<th>Password</th>
					<th>Email</th>
					<th>Tipo</th>
					<th>Estado</th>
					<th></th>

				</tr>";

		
		for ($fila=1; $fila<=20; $fila++) {
				echo "<tr>";
			for ($celda=1; $celda<=3; $celda++) {

				while ($usuario = mysqli_fetch_array($usuarios)) {

					$usu_id=$usuario['usu_id'];


					if($usuario['usu_estado']=='alta'){
						echo "<td> <button type='button' class='log-btn' name='submit' onclick='baja_usuario(".$usu_id.")'>Baja</button></td>";
						echo "<td>".$usuario['usu_id'] . "</td>";
						echo "<td>".$usuario['usu_usuario'] . "</td>";
						echo "<td>".$usuario['usu_nombre'] . "</td>";
						echo "<td>".$usuario['usu_apellido1'] . "</td>";
						echo "<td>".$usuario['usu_apellido2'] . "</td>";
						echo "<td>".$usuario['usu_pwd'] . "</td>";
						echo "<td>".$usuario['usu_mail'] . "</td>";
						//echo "<td>".$usuario['tipU_id'] . "</td>";
						if ($usuario['tipU_id']<= 1 ){
							echo "<td>profesor</td>";
						}else{
							echo "<td>administrador</td>";
						}
						echo "<td>".$usuario['usu_estado'] . "</td>";
						echo "<td> <button type='button' class='log-btn' name='submit' onclick='modifica_usuario(".$usu_id.")'>Modifica</button></td>";
					}else{
						echo "<td> <button type='button' class='log-btn' name='submit' onclick='alta_usuario(".$usu_id.")'>Alta</button></td>";
						echo "<td>".$usuario['usu_id'] . "</td>";
						echo "<td>".$usuario['usu_usuario'] . "</td>";
						echo "<td>".$usuario['usu_nombre'] . "</td>";
						echo "<td>".$usuario['usu_apellido1'] . "</td>";
						echo "<td>".$usuario['usu_apellido2'] . "</td>";
						echo "<td>".$usuario['usu_pwd'] . "</td>";
						echo "<td>".$usuario['usu_mail'] . "</td>";
						//echo "<td>".$usuario['tipU_id'] . "</td>";
						if ($usuario['tipU_id']<= 1 ){
							echo "<td>profesor</td>";
						}else{
							echo "<td>administrador</td>";
						}
						echo "<td>".$usuario['usu_estado'] . "</td>";
						echo "<td> <button type='button' class='log-btn' name='submit' onclick='modifica_usuario(".$usu_id.")'>Modifica</button></td>";

					}
						echo "</tr>";
				}
			}
		}
	}else{
		echo "<table style='margin-bottom: 5px; margin-top: 5px'>";
		echo "</table>";
		echo "<table style='margin-bottom: 5px'>";
		echo "<th> Hay un total de ".mysqli_num_rows($usuarios)." registros en el sistema </th>";
		echo "</table>";


	}	





 ?>
</div>
</body>
</html>