<?php
$koneksi = mysqli_connect("localhost","root","","siamib");

//cek koneksi
if(mysqli_connect_errno()){
    echo "koneksi database gagal : ",mysqli_connect_error();
} else{
    //echo "koneksi sukses";
}
?>