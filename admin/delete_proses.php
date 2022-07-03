<?php
include_once("../koneksi.php");

$idbarang = $_GET['id'];
$result = mysqli_query($koneksi,"DELETE FROM tabel_inventori WHERE id_barang='$idbarang'");

header ("Location: inventori.php");

?>