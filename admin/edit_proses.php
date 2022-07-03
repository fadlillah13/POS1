<?php
include_once("../koneksi.php");

if (isset($_POST['Update'])){
    $idbarang =$_POST['idbarang'];
    $kodebarang =$_POST['kodebarang'];
    $namabarang =$_POST['namabarang'];
    $hargabeli =$_POST['hargabeli'];
    $hargajual =$_POST['hargajual'];
    $stokbarang =$_POST['stokbarang'];

    $result = mysqli_query($koneksi,"UPDATE tabel_inventori SET nama_barang='$namabarang',harga_beli='$hargabeli',harga_jual='$hargajual',stok_barang='$stokbarang' WHERE id_barang='$idbarang'");

    header ("Location: inventori.php");
}
?>