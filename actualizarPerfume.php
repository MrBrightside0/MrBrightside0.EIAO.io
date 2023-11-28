<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
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


    $sql = "UPDATE perfumes SET nombre='$nombre', precio='$precio', cantidad_disponible='$cantidad_disponible', vendidos='$vendidos', proveedor='$proveedor' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }

    $conn->close();
}
?>
