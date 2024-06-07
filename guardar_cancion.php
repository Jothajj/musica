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
$artista = $_POST['artista'];
$genero = $_POST['genero'];
$descripcion = $_POST['descripcion'];

$instruccion_SQL = "INSERT INTO canciones (nombre, artista, genero, descripcion) VALUES ('$nombre', '$artista', '$genero', '$descripcion')";
$resultado = mysqli_query($connection, $instruccion_SQL);

if (!$resultado) {
    die("Error al insertar los datos: " . mysqli_error($connection));
}

echo "Canción agregada exitosamente";
mysqli_close($connection);

echo '<a href="agregar_cancion.html"> Agregar otra canción</a><br>';
echo '<a href="index.html"> Volver al inicio</a>';
?>
