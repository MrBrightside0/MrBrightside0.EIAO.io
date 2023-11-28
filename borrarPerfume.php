<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "perfumes";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }


    $sql = "DELETE FROM perfumes WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    $conn->close();
}
?>
