<?php
include('includes/config.php');
// verificar si se ha enviado el formulario
if (isset($_POST['actualizar_imagen'])) {
  $id_imagen = $_POST['id_imagen'];

  // verificar si se ha seleccionado un nuevo archivo
  if (isset($_FILES['nueva_imagen']) && $_FILES['nueva_imagen']['error'] === UPLOAD_ERR_OK) {
    // obtener los detalles del archivo
    $nombre_temporal = $_FILES['nueva_imagen']['tmp_name'];
    $nombre_archivo = $_FILES['nueva_imagen']['name'];

    // mover el archivo a la ubicación deseada
    $ruta_destino = '../images/' . $nombre_archivo;
    if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
      // actualizar la ruta de la imagen en la base de datos
      $query = mysqli_query($con, "UPDATE carrusel_images SET image_path = '$nombre_archivo' WHERE id = '$id_imagen'");
      if ($query) {
        // redirigir a la página de carrusel después de actualizar la imagen
        header('Location: carrusel.php');
        exit;
      } else {
        echo "Error al actualizar la imagen en la base de datos.";
      }
    } else {
      echo "Error al mover el archivo cargado.";
    }
  } else {
    echo "No se ha seleccionado un archivo válido.";
  }
}
?>
