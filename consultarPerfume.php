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


    $sql = "SELECT * FROM perfumes WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Cantidad Disponible</th><th>Vendidos</th><th>Proveedor</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['precio'] . "</td>";
            echo "<td>" . $row['cantidad_disponible'] . "</td>";
            echo "<td>" . $row['vendidos'] . "</td>";
            echo "<td>" . $row['proveedor'] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados para el ID $id en la tabla perfumes.";
    }

    $conn->close();
}
?>
