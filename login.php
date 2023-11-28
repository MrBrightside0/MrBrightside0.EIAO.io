<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfumes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  session_start();
  $_SESSION['username'] = $username;
  
  echo "<html><head><title>Bienvenido al Panel de Administrador</title></head><body>";
  echo "<h1>Bienvenido al Panel de Administrador</h1>";
  echo "<p>Seleccione una acción:</p>";
  echo "<ul>";
  echo "<li><a href='admin-panel.html'>Ir al Panel de Administrador</a></li>";
  echo "</ul>";
  echo "</body></html>";
} else {

    echo "Usuario o contraseña incorrectos";
}

$conn->close();
?>
