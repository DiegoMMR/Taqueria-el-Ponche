<?php

	$ID=$_POST['codFactura'];
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
			$sql ="call encabezado($ID);";
			$ejecutar=mysql_query($sql);
			if (!$ejecutar) {
				echo$sql;
			}else{
				$lista_factura=mysql_fetch_array($ejecutar);
			}
	
		}
	}

	mysql_close($conectar);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Factura</title>
	<link rel="stylesheet" type="text/css" href="estiloTabla.css">
</head>
<body>
	<h1>Factura</h1>
	<h3>Taqueria el Ponche</h3>
		<?php  
			echo "<p>Factura # ";
				echo$lista_factura['id_factura'];
			echo "</p>";
			echo "<p>Cliente: ";
				echo$lista_factura['nombre'];
				echo " ";
				echo$lista_factura['apellido'];
			echo "</p>";
			echo "<p>Nit: ";
				echo$lista_factura['nit'];
			echo "</p>";
			echo "<p>Fecha ";
				echo$lista_factura['fecha'];
			echo "</p>";
		?>

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
						$sql ="call descripcionFactura($ID);";
						$ejecutar=mysql_query($sql);
						if (!$ejecutar) {
							echo$sql;
						}else{
							$lista_descripcion=mysql_fetch_array($ejecutar);
						}
				
					}
				}

				mysql_close($conectar);
			?>
	<table>
			<th>Cantidad</th>
			<th>Plato</th>
			<th>Precio</th>
			<th>Subtotal</th>

			<?php 
				$total = 0;
				for ($i=0; $i < $lista_descripcion; $i++) { 
					echo "<tr>";
						echo "<td>";
							echo$lista_descripcion['cantidad'];
						echo "</td>";
						echo "<td>";
							echo$lista_descripcion['nombre_plato'];
						echo "</td>";
						echo "<td>";
							echo$lista_descripcion['precio'];
						echo "</td>";
						echo "<td>";
							echo "Q. ";
							echo$lista_descripcion['subtotal'];
							$total = $total + $lista_descripcion['subtotal'];
						echo "</td>";
					echo "</tr>";
					$lista_descripcion=mysql_fetch_array($ejecutar);
				}
				
			 ?>
	</table>

	<?php 
		echo "<p>Total a Pagar Q. ";
				echo$total;
			echo "</p>";
	 ?>
<form action="factura.html">
    <input type=submit value="Otra factura">
</form>
<br>
<form action="index.html">
    	<input type=submit value="Volver">
</form>

</body>
</html>