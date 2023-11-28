<?php
session_start(); 


if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header('Location: login.html'); 
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfumes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'consultarPerfumes':
                $sql = "SELECT * FROM perfumes";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    echo "<h3>Registros de la tabla perfumes:</h3>";
                    while ($row = $result->fetch_assoc()) {
                        echo "ID: " . $row['id'] . " Nombre: " . $row['nombre'] . "<br>";
                    }
                } else {
                    echo "No se encontraron resultados en la tabla perfumes.";
                }
                break;

            case 'consultarUsuarios':
                $sql = "SELECT * FROM usuarios";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    echo "<h3>Registros de la tabla usuarios:</h3>";
                    while ($row = $result->fetch_assoc()) {
                        echo "ID: " . $row['id'] . " Nombre de usuario: " . $row['username'] . "<br>";
                    }
                } else {
                    echo "No se encontraron resultados en la tabla usuarios.";
                }
                break;


            default:
                echo "Acción no válida.";
                break;
        }
    }
}

$conn->close();
?>
