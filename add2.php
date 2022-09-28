<?php
  $host="localhost";  
  $user="root";
  $password="";
  $database="lindavista";
  $mysql=new mysqli($host,$user,$password,$database);
  if ($mysql->connect_error)
    die("Problemas con la conexion a la base de datos");

  $foto = $_FILES['foto_vivenda']['name'];
  $foto_temporal = $_FILES['foto_vivenda']['tmp_name'];
  $destino = "img/".$foto;
  move_uploaded_file($foto_temporal,$destino . $foto);
  copy($foto_temporal,$destino);

  $mysql->query("insert into viviendas (tipo_vivenda, zona_vivenda, direccion_vivenda, ndormitorios_vivenda, precio_vivenda, tamano_vivenda, extras_vivenda, foto_vivenda, observaciones_vivenda)
      values ('$_REQUEST[tipo_vivenda]', '$_REQUEST[zona_vivenda]', '$_REQUEST[direccion_vivenda]', '$_REQUEST[ndormitorios_vivenda]', '$_REQUEST[precio_vivenda]', '$_REQUEST[tamano_vivenda]', '$_REQUEST[extras_vivenda]', '$destino', '$_REQUEST[observaciones_vivenda]')") 
      or
      die($mysql->error);

  $mysql->close();

  header('Location:index.php');  
?>  