<?php
// aktifkan session
session_start();

// hapus session
session_destroy();

// Arahkan ke login page
header("location:../index.php?pesan=logout");
?>