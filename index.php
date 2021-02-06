<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="guardar-tabla.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="int" name="edad"  class="form-control" placeholder="Edad" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="direccion"  class="form-control" placeholder="Direccion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="telefono"  class="form-control" placeholder="Telefono" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="ciudad"  class="form-control" placeholder="Ciudad" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="email"  class="form-control" placeholder="Email" autofocus>
          </div>
          <input type="submit" name="guardar-tabla" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Ciudad</th>
            <th>Email</th>
            <th>Fecha</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['ciudad']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar-tabla.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>