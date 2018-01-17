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
	$ID=$_POST['codFactura'];
	$fecha=$_POST['fecha'];
	$cliente=$_POST['codCliente'];
	//hacemos la sentencia de sql
	$sql="INSERT INTO factura VALUES('$ID', '$fecha', '$cliente')";
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
	<form action="ingresarFactura.html">
    	<input type=submit value="Otra Factura">
	</form>

	<form action="index.html">
    	<input type=submit value="Volver">
	</form>
</body>
</html>