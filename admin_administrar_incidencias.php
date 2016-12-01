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
	<title>gestión administrador</title>
	<meta charset="utf-8"> 
	  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'> 
	<link rel="stylesheet" href="css/style.css">
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
<div class="admin">


<form action="bienvenido_admin.php" method="post" id="admin1" accept-charset="utf-8">


	<h1 style="color:blue; text-align:left; ">ESTE ESPACIO SE ENCUENTRA EN CONSTRUCCIÓN</h1>
	<input type="submit" name="submit" class="log-btn2" value="Trabaja Duro y lo Conseguirás Seguro">

	
</form>
</div>
</body>
</html>