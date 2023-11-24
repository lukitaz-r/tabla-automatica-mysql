<?php
$servername = "nombre-servidor";
$username = "usuario-db";
$password = "contraseña-db";
$dbname = "nombre-db";
$dbtabla = "nombre-db-donde-está-la-tabla";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de la tabla
$sql = "SELECT * FROM $dbtabla";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generar la tabla HTML
    echo "<table class='table table-striped'>";
    echo "<thead>    
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Nombre</th>
            <th scope='col'>Apellido</th>
            <th scope='col'>Edad</th>
            <th scope='col'>Dirección</th>
            <th scope='col'>Email</th>
        </tr>
    </thead>";
    
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td scope='row'>" . $row["id"] . "</td>";
        echo "<td scope='row'>" . $row["nombre"] . "</td>";
        echo "<td scope='row'>" . $row["apellido"] . "</td>";
        echo "<td scope='row'>" . $row["edad"] . "</td>";
        echo "<td scope='row'>" . $row["direccion"] . "</td>";
        echo "<td scope='row'>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    
    echo "</table>";
} else {
    echo "No se encontraron datos en la tabla";
}

// Cerrar la conexión
$conn->close();
?>