<?php
include "includes/conexion_bd.php";
session_start();

if(!isset($_SESSION['username'])){
	header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>calendario</title>
	
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="style.css">

	<script type="text/javascript">

	function dia_reserva(id, usu_id){

			alert(id);
			alert(usu_id);
			//no entindo porqué coge los datos pero no los pasa!

			window.location = 'recurso_calendario.proc.php?&rec_id='+id+'&usu_id='+id_usu;


	}

	function refresca(){
		alert ("llega");
		alert ("pues no llega");
/*
			var listaMes = document.getElementById("mes");
			var mesIndice = listaMes.selectedIndex;
			var mesSeleccionado = listaMes.options[mesIndice];
			var mesTexto = mesSeleccionado.text;
			var valorSeleccionado = mesSeleccionado.value;
			alert("Opción seleccionada: " + mesTexto + "\n Valor de la opción: " + valorSeleccionado);
*/
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

<div class="admin">

	<?php 
	extract($_REQUEST);

	$rec_id = $_REQUEST['rec_id'];
	$usu_id = $_REQUEST['usu_id'];
/*
	PRUEBO QUE ME PASA LOS VALORES
	echo $rec_id;
	echo "<br>";
	echo $usu_id;
*/
	 ?>

	<form action="recurso_calendario.proc.php" method="post" class="formulario" accept-charset="utf-8">	
		<?php
		ECHO "<select name='mes' id='mes'>";
			
			$meses= array ('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
			
			foreach ($meses as $mes) {
			 
				echo "<option value = ".$mes.">" .$mes. "</option>";
			}
		
		echo "</select>";		
		?>	

		<select name="dia" id="dia">

			<?php
	
			for ($i=1; $i<=31; $i++ ) {
				$dia = $i; 
				echo "<option value=".$dia.">" .$dia. "</option>";
			}

			?>
				
		</select>

<?php  
		echo "<button type='button' class='log-btn' name='submit'  onclick='dia_reserva(".$rec_id.",".$usu_id.")'>Seleccionar</button>";

?>
			
	<br/>
	<br/>
		<select name="hora">

			<?php

			for ($i=9; $i<18; $i++ ) {

				/*if(hora inicio= a hora){

				}else{*/

				$hora = $i; 
				echo "<option value=".$hora.">" .$hora.":00" . "</option>";
				// }	
			}
			?>
		</select>

    	<input type="submit" name="submit" value="dale">
	</form>

</div>
</body>
</html>















<!-- 
ESTA ERA LA PARTE DE LAS RESERVA DE RECURSO PARA EL MOMENTO.
		/*extract($_REQUEST);


		$sql_insert = "INSERT INTO tbl_reservas (usu_id, rec_id, res_finicio) VALUES ($usu_id, $rec_id, current_timestamp)";

		$sql_update = "UPDATE tbl_recursos SET rec_estado = 'Ocupado' WHERE tbl_recursos.rec_id = $rec_id";

		 $reservar = mysqli_query($conexion, $sql_insert);
		 $actualizar = mysqli_query($conexion, $sql_update);

		

		$sql_insert = "INSERT INTO tbl_reservas (usu_id, rec_id) VALUES ($usu_id, $rec_id)";
		$sql_update = "UPDATE tbl_recursos SET rec_estado = 'Ocupado' WHERE tbl_recursos.rec_id = $rec_id";

		header('location: recursos.php');

*/ -->