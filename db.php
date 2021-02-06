<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'crud-php'
) or die(mysqli_erro($mysqli));

?>