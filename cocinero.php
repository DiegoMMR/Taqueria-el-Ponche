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
			$sql ="SELECT * FROM cocinero";
			$ejecutar=mysql_query($sql);
			if (!$ejecutar) {
				echo$sql;
			}else{
				$lista_cocinero=mysql_fetch_array($ejecutar);
			}
	
		}
	}

	mysql_close($conectar);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ordenes</title>
	<link rel="stylesheet" type="text/css" href="estiloTabla.css">
</head>
<body>
	<h1>Pedidos</h1>
	<table>
		<tr>
			<th>Cantidad</th>
			<th>Plato</th>
			<th>Para Factura</th>
			<?php 
				for ($i=0; $i < $lista_cocinero; $i++) { 
					echo "<tr>";
						echo "<td>";
							echo$lista_cocinero['cantidad'];
						echo "</td>";
						echo "<td>";
							echo$lista_cocinero['nombre_plato'];
						echo "</td>";
						echo "<td>";
							echo$lista_cocinero['factura_id_factura'];
						echo "</td>";						
					echo "</tr>";
					$lista_cocinero=mysql_fetch_array($ejecutar);
				}
			 ?>
		</tr>
	</table>

<form action="index.html">
    	<input type=submit value="Volver">
	</form>
</body>
</html>