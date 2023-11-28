<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_cliente = $_POST['id_cliente'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "perfumes";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }


    $sql = "DELETE FROM clientes WHERE id_cliente='$id_cliente'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    $conn->close();
}
?>
