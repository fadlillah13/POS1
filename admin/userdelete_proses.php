<?php
include_once("../koneksi.php");
?>

<?php
  $id = $_GET['id'];


  $result = mysqli_query($koneksi,"DELETE FROM admin WHERE id = '$id'");

  header("location: user.php");

?>