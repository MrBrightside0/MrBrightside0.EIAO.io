<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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


    $sql = "INSERT INTO clientes (nombre_cliente, apellido_cliente, perfume_comprado, cantidad, numero_telefonico) VALUES ('$nombre_cliente', '$apellido_cliente', '$perfume_comprado', '$cantidad', '$numero_telefonico')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente.";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }

    $conn->close();
}
?>
