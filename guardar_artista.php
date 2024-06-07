<?php 
$user = "root";
$pass = "";
$host = "localhost";

// Conexión a la base de datos
$connection = mysqli_connect($host, $user, $pass);

if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_connect_error());
}

$datab = "musica";
$db = mysqli_select_db($connection, $datab);

if (!$db) {
    die("No se ha encontrado la base de datos: " . mysqli_error($connection));
}

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$genero = $_POST['genero'];
$album = $_POST['album'];

$instruccion_SQL = "INSERT INTO artistas (nombre, descripcion, genero, album) VALUES ('$nombre', '$descripcion', '$genero', '$album')";
$resultado = mysqli_query($connection, $instruccion_SQL);

if (!$resultado) {
    die("Error al insertar los datos: " . mysqli_error($connection));
}

echo "Artista agregado exitosamente";
mysqli_close($connection);

echo '<a href="agregar_artista.html"> Agregar otro artista</a><br>';
echo '<a href="index.html"> Volver al inicio</a>';
?>
