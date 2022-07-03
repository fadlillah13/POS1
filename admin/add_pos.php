<?php
include_once("../koneksi.php");

if(isset($_POST['submit'])){

    $kodejual       = $_POST['kodejual'];
    $idbarang       = $_POST['idbarang'];
    $jumlahbarang   = $_POST['jumlahbeli'];

    $result = mysqli_query($koneksi,"SELECT *FROM tabel_inventori WHERE id_barang='$idbarang'");

    while($user_data = mysqli_fetch_array($result)){
        $kodebarang = $user_data['kode_barang'];
        $namabarang = $user_data['nama_barang'];
        $hargabeli  = $user_data['harga_beli'];
        $hargajual  = $user_data['harga_jual'];
        $stokbarang = $user_data['stok_barang'];
    }
    $totaljual  =$jumlahbarang * $hargajual;
    $totallaba  =($hargajual-$hargabeli)*$jumlahbarang;

    // Masukan data ke database
    $query = "INSERT INTO tabel_jual(kode_jual,kode_barang,harga_barang,jumlah_barang,total_jual,total_laba) VALUES('$kodejual','$kodebarang','$hargajual','$jumlahbarang','$totaljual','$totallaba')";

    if(mysqli_query($koneksi,$query)){
        header("Location:pos.php?id=$kodejual");
    }
}

?>