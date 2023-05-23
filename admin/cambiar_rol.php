<?php
include('includes/config.php');

// Obtener el id del usuario y el nuevo rol de la URL
$idUsuario = $_GET['id'];
$nuevoRol = $_GET['rol'];

// Actualizar el rol del usuario en la base de datos
$sql = "UPDATE usuarios SET rol = '$nuevoRol' WHERE idUsuario = $idUsuario";
$result = mysqli_query($con, $sql);

// Verificar si la consulta se realizó con éxito
if ($result) {
    // Redirigir al usuario de vuelta a la página de usuarios
    header('Location: roles.php');
} else {
    // Mostrar un mensaje de error si la consulta falló
    echo "Error al actualizar el rol del usuario";
}

mysqli_close($conn);
?>