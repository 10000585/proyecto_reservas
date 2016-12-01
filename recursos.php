<?php
include "includes/conexion_bd.php";
session_start();

//Ahora la comprobación se hace mediante el tipo de usuario y no la categoría
/*if(!isset($_SESSION['username']) || $_SESSION['categoria'] == 'administrador'){
	header('location:index.php');
}*/

if(!isset($_SESSION['username'])){
	header('location:index.php');
}



// include "includes/login.php";
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Titanium Recursos</title>
  
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">
   
	<script type="text/javascript">
	function recurso_calendario(id , id_usu){

		//alert(id + id_usu);
		window.location = 'recurso_calendario.php?&rec_id='+id+'&usu_id='+id_usu;
		
	}

	function update_res(rec_id , res_id){
		// alert(rec_id + "__" + res_id);
		window.location = 'recursos_1_update_res.php?&rec_id='+rec_id+'&res_id='+res_id;
	}
	</script>
  

</head>
<div class="encabezado">
			<div class="enc_1">
			<img src="img/logo1.png">
			</div>
			<div class="enc_2">
                <h1> <font face="Helvetica" COLOR="#0079BA">Administrar Recursos</font></h1>
            </div>
            <div class="enc_3">
                <font face="Helvetica" COLOR="#0079BA"><span ria-hidden="true"><H4>USUARIO: <?php echo $_SESSION['username'];?></H4> </span></font>
            </div>
            
    </div>

<body>
	
  <div class="estadistica">
  	
  
   <!-- OJO este link hay que cambiarlo porque lo tengo en otra carpeta y hago retroceder -->
	<!-- <a href="../Titanios/index.php">Volver al Login</a><br/><br/> -->
	<?php

	// 	//realizamos la conexión
	// 	$conexion = mysqli_connect('localhost', 'root', '', 'bd_titanio');
	// // Cojo la idea de David para lo acentos para que no 	tengamos problemas con la descripción
	// 	$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

	// 	if (!$conexion) {
	// 	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	// 	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	// 	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	// 	    exit;
	// 	}


		extract($_REQUEST);

		$sql = "SELECT rec_nombre, rec_descripcion, rec_id, rec_estado, rec_foto FROM tbl_recursos ORDER BY rec_id";

		$recursos = mysqli_query($conexion, $sql);

		//Comprobamos la sentencia sql
		// echo $sql;

		// print_r($recursos);


		if (mysqli_num_rows($recursos)>0) {
			
			//echo "Tenemos " .mysqli_num_rows($recursos) . " recursos en la base de datos<br/><br/>";
			echo "<br/>";

			while ($recurso = mysqli_fetch_array($recursos)) {
				$imagen = $recurso['rec_foto'];

				// echo $imagen;
				// echo "<img src='img/".$imagen.".png'>";
				?>
				<div class="espaciosindiv" style="background: url('img/<?php echo $imagen; ?>');">
				<?php
				echo "<div class='titulo'>";
				echo $recurso['rec_nombre'] . "</div>";
				echo "<div class='descripcion'>";
				echo $recurso['rec_descripcion'] . "</div>";
				
				$id = $recurso['rec_id'];
				$id_usu = $_SESSION['id_usuario'];
				// echo $id;
				// echo $id_usu;
				echo "<div class='boton'>";
				echo '<button type="button"  class="log-btn" name="submit"  onclick="recurso_calendario(\''.$id. '\' , \''.$id_usu. '\')">Reservar</button>';
				echo "</div>";

				echo "</div>";

			}
		} else {
			echo "Lo sentimos en estos momentos el colegio no dispone de recursos";
		}

	?>
<br/>

</div>

<div class="estadistica">

	<?php

	$usu_id_consulta = $_SESSION['id_usuario'];


	$sql = "SELECT tbl_recursos.rec_nombre, tbl_recursos.rec_descripcion, tbl_reservas.res_finicio, tbl_reservas.res_ffin, tbl_recursos.rec_id, tbl_reservas.res_id FROM tbl_reservas, tbl_recursos WHERE tbl_recursos.rec_id = tbl_reservas.rec_id AND tbl_reservas.usu_id = $usu_id_consulta ORDER BY tbl_reservas.res_ffin asc";

	$recursos = mysqli_query($conexion, $sql);

	
	echo "<table style='margin-top:20px;'>

			<tr>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Fecha Inicio</th>
				<th>Fecha fin</th>
				<th>Botón devolución</th>
			</tr>";
	
	for ($fila=1; $fila<=5; $fila++) {
			echo "<tr>";
		for ($celda=1; $celda<=5; $celda++) {
			while ($recurso = mysqli_fetch_array($recursos)) {

				echo "<td>".$recurso['rec_nombre'] . "</td>";
				echo "<td>".$recurso['rec_descripcion'] . "</td>";
				echo "<td>".$recurso['res_finicio'] . "</td>";
				echo "<td>".$recurso['res_ffin'] . "</td>";


				
				$rec_id = $recurso['rec_id'];
				$res_id = $recurso['res_id'];
				//Hemos ido comprobando que recogemos las variables correctamente
				// echo $res_id;
				// echo $rec_id;
 				
 				if (empty($recurso['res_ffin'])){
				echo "<td> <button type='button' class='log-btn' name='submit'  onclick='update_res(\"".$rec_id. "\" , \"".$res_id. "\")' >Devolución</button></td>";
				echo "</tr>" ;
				}else {
					echo "<td> <button type='button' class='log-btn' name='submit'  onclick='update_res(\"".$rec_id. "\" , \"".$res_id. "\")' disabled='true'>Devolución</button></td>";
				echo "</tr>" ;


				}
			}
		
			}

	 	}

		// echo "</tr>" ;
 	

 	?>
</div>
</body>
</html>
