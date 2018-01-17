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
	$ID=$_POST['IDPlato'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$precio=$_POST['precio'];
	//hacemos la sentencia de sql
	$sql="INSERT INTO menu VALUES('$ID', '$nombre', '$descripcion', '$precio')";
	//ejecutamos la sentencia de sql
	$ejecutar=mysql_query($sql);
	//verificamos la ejecucion
	if(!$ejecutar){
		echo"Hubo Algun Error";
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
	<form action="ingresarMenu.html">
    	<input type=submit value="Otro Plato">
	</form>

	<form action="index.html">
    	<input type=submit value="Volver">
	</form>

</body>
</html>