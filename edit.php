<?php
include("db.php");
$nombre = '';
$edad= '';
$direccion= '';
$telefono= '';
$ciudad= '';
$email= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $edad = $row['edad'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $ciudad = $row['ciudad'];
    $email = $row['email'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $edad = $_POST['edad'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $ciudad = $_POST['ciudad'];
  $email = $_POST['email'];

  $query = "UPDATE task set nombre = '$nombre', edad = '$edad', direccion = $direccion', telefono = $telefono', ciudad = '$ciudad', email = '$email' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Datos Actualizados Satisfactoriamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar Nombre">
        </div>
        <div class="form-group">
          <input name="edad" type="int" class="form-control" value="<?php echo $edad; ?>" placeholder="Actualizar Edad">
        </div>
        <div class="form-group">
          <input name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="Actualizar Direccion">
        </div>
        <div class="form-group">
          <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="Actualizar Telefono">
        </div>
        <div class="form-group">
          <input name="ciudad" type="text" class="form-control" value="<?php echo $ciudad; ?>" placeholder="Actualizar Ciudad">
        </div>
        <div class="form-group">
          <input name="email" type="int" class="form-control" value="<?php echo $email; ?>" placeholder="Actualizar Email">
        </div>
        <button class="btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
