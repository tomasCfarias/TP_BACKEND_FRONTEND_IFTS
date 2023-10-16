<?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td data-label='ID'>" . $row["id"] . " "."</td>";
        echo "<td data-label='Email'>" . $row["email"] ." ". "</td>";
        echo "<td data-label='Usuario'>" . $row["username"] . " "."</td>";
        echo "<td data-label='Accion'><a href='modificarUsuarios.php?id=" . $row['id'] . "'>MODIFICAR</a></td>";
        echo "<td data-label='Accion'><a href='borrarUsuarios.php?id=" . $row['id'] . "'>BORRAR</a></td>";
        echo "</tr>";
    }
} else {
    echo "NO HAY REGISTROS";
}
?>