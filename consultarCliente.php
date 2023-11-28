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

    $sql = "SELECT * FROM clientes WHERE id_cliente='$id_cliente'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID Cliente</th><th>Nombre</th><th>Apellido</th><th>Perfume Comprado</th><th>Cantidad</th><th>Número Telefónico</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_cliente'] . "</td>";
            echo "<td>" . $row['nombre_cliente'] . "</td>";
            echo "<td>" . $row['apellido_cliente'] . "</td>";
            echo "<td>" . $row['perfume_comprado'] . "</td>";
            echo "<td>" . $row['cantidad'] . "</td>";
            echo "<td>" . $row['numero_telefonico'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados para el ID $id_cliente en la tabla clientes.";
    }

    $conn->close();
}
?>
