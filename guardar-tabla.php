<?php

include('db.php');

if (isset($_POST['guardar-tabla'])) {
  $nombre = $_POST['nombre'];
  $edad = $_POST['edad'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $ciudad = $_POST['ciudad'];
  $email = $_POST['email'];






  $query = "INSERT INTO task(nombre, edad, direccion, telefono, ciudad, email) VALUES ('$nombre', '$edad',  '$direccion', '$telefono', '$ciudad', '$email')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Tabla Guardada Satisfactoriamnte';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>