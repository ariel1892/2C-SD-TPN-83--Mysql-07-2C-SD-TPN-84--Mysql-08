<?php
$host="localhost";  
$user="root";
$password="";
$database="lindavista";
 $mysql=new mysqli($host,$user,$password,$database);
	if ($mysql->connect_error)
	  die("Problemas con la conexion a la base de datos");

    $mysql->query("delete from viviendas where id_vivenda='$_REQUEST[id_vivenda]'") or
        die($mysql->error);

    $mysql->close();

    header('Location:index.php');

?>