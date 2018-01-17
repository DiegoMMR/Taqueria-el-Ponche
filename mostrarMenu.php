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
		}else{
			$sql ="SELECT * FROM menu";
			$ejecutar=mysql_query($sql);
			if (!$ejecutar) {
				echo$sql;
			}else{
				$lista_menu=mysql_fetch_array($ejecutar);
			}
	
		}
	}

	mysql_close($conectar);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mostrar Menu</title>
	<link rel="stylesheet" type="text/css" href="estiloTabla.css">
</head>
<body>
	<h1>Menú</h1>
	<table>
		<tr>
			<th>ID Plato</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Precio</th>
			<?php 
				for ($i=0; $i < $lista_menu; $i++) { 
					echo "<tr>";
						echo "<td>";
							echo$lista_menu['id_plato'];
						echo "</td>";
						echo "<td>";
							echo$lista_menu['nombre_plato'];
						echo "</td>";
						echo "<td>";
							echo$lista_menu['descripcion_plato'];
						echo "</td>";
						echo "<td>";
							echo "Q. ";
							echo$lista_menu['precio'];
						echo "</td>";
					echo "</tr>";
					$lista_menu=mysql_fetch_array($ejecutar);
				}
			 ?>
		</tr>
	</table>

	<form action="ingresarMenu.html">
    	<input type=submit value="Nuevo Plato">
	</form>
	<br>
	<form action="index.html">
    	<input type=submit value="Volver">
	</form>
<br>
	
</body>
</html>