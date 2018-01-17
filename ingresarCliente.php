<?php
	//conectamos Con el servidor
	$conectar=@mysql_connect('localhost','root','');
	//verificamos la conexion
	if(!$conectar){
		echo"No Se Pudo Conectar Con El Servidor";
	}else{

		$base=mysql_select_db('tacos');
		if(!$base){
			echo"No Se Encontro La Base De Datos";			
		}
	}
	//recuperar las variables
	$ID=$_POST['codCliente'];
	$nit=$_POST['nit'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	//hacemos la sentencia de sql
	$sql="INSERT INTO clientes VALUES('$ID', '$nit', '$nombre', '$apellido', '$direccion', '$telefono')";
	//ejecutamos la sentencia de sql
	$ejecutar=mysql_query($sql);
	//verificamos la ejecucion
	if(!$ejecutar){
		echo mysql_errno($conectar) . ": " . mysql_error($conectar) . "\n";
	}else{
		echo"Datos Guardados Correctamente<br>";
	}
	mysql_close($conectar);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estiloTabla.css">
</head>
<body>
	<form action="ingresarCliente.html">
    	<input type=submit value="Otro Cliente">
	</form>
	<br>
	<form action="index.html">
    	<input type=submit value="Volver">
	</form>

</body>
</html>