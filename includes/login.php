<?php
include "includes/conexion_bd.php";
//realizamos la conexión
        // $conexion = mysqli_connect('localhost', 'root', '', 'bd_titanio');

        // //le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
        // $acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

        //  if (!$conexion) {
        //      echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        //      echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        //      echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        //      exit;
        //  }


// include_once "includes/conexion_bd.php";

   //CÓDIGO DE LOGIN:
        extract($_REQUEST);

        //1.- Si existe la variable submit hacer:
    if(isset($submit)){
        
        //2.- Asignación de variables recibidas:
        $usu_usuario = trim($username);
        $usu_pwd = trim($password);

        if(!isset($admin)){
            // echo "No existe <br/>";
            $tipU_id = 1;
           /* Modifico esta parte porque he introducido una nueva tbl_tipoUsuario
            $usu_categoria = 'profesor';*/
        } else {
            $tipU_id = 2;
           /* Modifico esta parte porque he introducido una nueva tbl_tipoUsuario
            $usu_categoria = 'administrador';*/
            // echo "Existe <br/>";
        }
        // $usu_categoria = $admin;

        
        //4.- Realización de consulta en la base de datos para los NO administradores
           /* $sql = "SELECT usu_usuario, usu_pwd, usu_categoria, usu_id FROM  tbl_usuarios WHERE usu_usuario = '$usu_usuario' and usu_pwd = '$usu_pwd' and usu_categoria = '$usu_categoria'";*/
           //Debo modificar la sentencia por la modificación de la base de datos 
            $sql = "SELECT usu_usuario, usu_pwd, usu_id, tipU_id FROM  tbl_usuarios WHERE usu_usuario = '$usu_usuario' and usu_pwd = '$usu_pwd' and tipU_id = '$tipU_id'";
            // echo $sql;
        

            $login = mysqli_query($conexion, $sql);



            // $records = $databaseConnection->prepare('SELECT usu_usuario, usu_pwd, usu_categoria FROM  tbl_usuarios WHERE usu_usuario = :username and usu_pwd = :password and usu_categoria = :admin');
            // $records->bindParam(':username', $usu_usuario);
            // $records->bindParam(':password', $usu_pwd);
            // $records->bindParam(':admin', $usu_categoria);
            // $records->execute();
            // $results = $records->fetch(PDO::FETCH_ASSOC);


       }

?>