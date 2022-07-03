<?php
include_once("../koneksi.php");

$id = $_GET['id'];

$result = mysqli_query($koneksi,"DELETE FROM tabel_jual WHERE kode_jual='$id'");


function generateRandomString($length = 5) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$kodebaru = generateRandomString();

header("location:pos.php?id=$kodebaru");