<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad_disponible = $_POST['cantidad_disponible'];
    $vendidos = $_POST['vendidos'];
    $proveedor = $_POST['proveedor'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "perfumes";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    $sql = "INSERT INTO perfumes (nombre, precio, cantidad_disponible, vendidos, proveedor) VALUES ('$nombre', '$precio', '$cantidad_disponible', '$vendidos', '$proveedor')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente.";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }

    $conn->close();
}
?>
