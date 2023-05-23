<?php
include('bd/db.php');

// Recibir datos del formulario
$userName = $_POST["userName"];
$password = md5($_POST["password"]);
$isActive = 1;
$rol = 0;
$imagen = "perfil.png";

// Insertar datos en la tabla "usuarios"
$sql = "INSERT INTO usuarios (userName, password, Is_Active, rol, imagen)
VALUES ('$userName', '$password', '$isActive', '$rol', '$imagen')";

if (mysqli_query($conn, $sql)) {
    echo "<script>+alert('Datos guardados correctamente'); window.location.href='index.php'</script>
<noscript><a href='index.php'>Datos guardados correctamente. Click aqui si no es redireccionado.</a></noscript>";

 }            
else { 
echo "<script>+alert('Ocurrio un error:".
$sql . "<br>" . mysqli_error($conn).". Intentalo mas tarde'); window.location.href='../tabla.php'</script>
<noscript><a href='../tabla.php'>Ocurrio un error. Intentalo mas tarde. Click aqui si no es redireccionado.</a></noscript>";
}

$conn->close();
?>
