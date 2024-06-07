<?php 
	$user = "root";
	$pass = "";
	$host = "localhost";

	//conexion a base de datos

	$connection = mysqli_connect($host, $user, $pass);


	$usuario = $_POST[usuario];
	$contrasena = $_POST[contrasena];

		if(!$connection)
			{
				echo "no se ha podido conectar con el servidor" . mysqli_error();
			}

		else
			{	
				echo "conectado al servidor";
			}	
			
	$datab = "musica";
	
	$db = mysqli_select_db($connection, $datab);
	
	if (!$db)
	{
		echo "no se ha encontrado la tabla";
	}
	else
	{
	echo "tabla seleccionada";
	}
	
	$intruccion_SQL = "INSERT INTO tabla(usuario, contrasena)
						VALUES('$usuario', '$contrasena')";
						
		$resultado = mysqli_query($connection, $intruccion_SQL);
		
		$consulta = "SELECT * FROM tabla ";
		
		$result = mysqli_query($connection, $consulta);
			if($result)
		{
			echo "no se ha podido realizar la consulta";
		}

		echo"<table>";
		echo"<tr>"
		echo"<th>id</th>";
		echo"<th>usuario</th>";
		echo"<th>contrasena</th>";
		echo"</tr>";
		
			while($colum = mysqli_fetch_array($result))
			{
				echo"<tr>"
				echo"<td>" . $colum['id']. "/<td>"; 
				echo"<td>" . $colum['usuario']. "/<td>";
				echo"<td>" . $colum['contrasena']. "/<td>";
				echo"</tr>";
			}
		echo"</table>";	
		
		mysqli_close( $connection);
		
		echo'<a href="index.html"> volver atras</a>';
?>