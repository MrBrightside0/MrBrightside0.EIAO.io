<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_cliente = $_POST['id_cliente'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $apellido_cliente = $_POST['apellido_cliente'];
    $perfume_comprado = $_POST['perfume_comprado'];
    $cantidad = $_POST['cantidad'];
    $numero_telefonico = $_POST['numero_telefonico'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "perfumes";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }


    $sql = "UPDATE clientes SET nombre_cliente='$nombre_cliente', apellido_cliente='$apellido_cliente', perfume_comprado='$perfume_comprado', cantidad='$cantidad', numero_telefonico='$numero_telefonico' WHERE id_cliente='$id_cliente'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }

    $conn->close();
}
?>
