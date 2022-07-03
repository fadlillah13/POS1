<?php
//aktifkan session php
session_start();

//koneksikan dengan dbms
include 'koneksi.php';

//tangkap data yang dikirim form
$username = $_POST['username'];
$password = $_POST['password'];

//cek data yang dikirim dengan yang ada di database
$data = mysqli_query($koneksi, "select * from admin where username='$username' and password='$password'");

//hitung jumlah yang ditentukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['username']=$username;
    $_SESSION['status']="login";
    header("location:admin/index.php");
}else{
    header("location:index.php?pesan=gagal");
}
?>