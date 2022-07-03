<!doctype html>
<html>


<head>
  <meta charset="utf-8" />
  <title>Invoice : <?php echo $id = $_GET['id']; ?></title>
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  
  <style type="text/css" media="all">
    body {
        max-width: 300px;
        margin: 0 auto;
        text-align: center;
        color: #000;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }

    #wrapper {
        min-width: 250px;
        margin: 0px auto;
    }

    #wrapper img {
        max-width: 300px;
        width: auto;
    }
        
    h2,
    h3,
    p {
        margin: 5px 0;
    }

    .left {
        width: 100%;
        float: right;
        text-align: right;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    
    .right {
        width: 40%;
        float: right;
        text-align: right;
        margin-bottom: 3px;
    }

    .table,
    .totals {
        width: 100%;
        margin: 10px 0;
    }

    .table th {
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        padding-top: 4px;
        padding-bottom: 4px;
    }

    .table td {
        padding: 0;
    }

    .totals td {
        width: 24%;
        padding: 0;
    }

    .table td:nth-child(2) {
        overflow: hidden;
    }

    @media print {
     body {
        text-transform: uppercase;
    }

    #buttons {
     display: none;
    }

    #wrapper {
       width: 100%;
       margin: 0;
       font-size: 9px;
    }

    #wrapper img {
        max-width: 300px;
        width: 80%;
    }

    #bkpos_wrp {
        display: none;
      }
    }
   </style>
</head>

<body>
  <div id="wrapper">
    <table border="0" style="border-collapse: collapse; width: 100%; height: auto;">
      <tr>
        <td width="100%" align="center">
         <h2 style="padding-top: 0px; font-size: 24px;"><strong>Toko RFF Saudara</strong></h2>
        </td>
      </tr>
    <tr>


        <?php
        include_once("../koneksi.php");
        $id = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT *FROM tabel_jual WHERE kode_jual='$id'");

        while ($user_data = mysqli_fetch_array($result)) {
          $tanggal = $user_data['tanggal_jual'];
        }
        $dt = new DateTime($tanggal);
        $date = $dt->format('d/m/Y');
        ?>

        <td width="100%">
          <span class="left" style="text-align: left;">Alamat : Nagari Sumanik, Kecamatan Salimpaung, Kabupaten Tanah Datar, Sumatera Barat, Indonesia
</span>
        <span class="left" style="text-align: left;">Telepon : 082388362097</span>
        <span class="left" style="text-align: left;">Tanggal : <?php echo $date; ?></span>
       </td>
      </tr>
    </table>



    <div style="clear:both;"></div>


    <table class="table" cellspacing="0" border="0">
      <thead>
        <tr>
         <th width="10%"><em>#</em></th>
         <th width="35%" align="left">Produk</th>
         <th width="10%">Qty</th>
         <th width="25%">Per Barang</th>
         <th width="20%" align="right">Total</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // Panggil semua data dari database
      include_once("../koneksi.php");
      $id = $_GET['id'];
      $result = mysqli_query($koneksi, "SELECT tabel_jual.*, tabel_inventori.nama_barang FROM tabel_jual JOIN tabel_inventori ON tabel_jual.kode_barang=tabel_inventori.kode_barang WHERE kode_jual='$id' ORDER BY id_jual DESC");
      $no=1;
      
      
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td style='text-align:center; width:30px;' valign='top'>" . $no . "</td>";
            echo "<td style='text-align:left; width:130px; padding-bottom: 10px' valign='top'>" . $user_data['nama_barang'] ."</td>";
            echo "<td style='text-align:center; width:50px;' valign='top'>" . $user_data['jumlah_barang'] . "</td>";
            echo "<td style='text-align:center; width:50px;' valign='top'>" . $user_data['harga_barang'] . "</td>";
            echo "<td style='text-align:right; width:70px;' valign='top'>" . $user_data['total_jual'] . "</td>";
            $no++;
        }
        ?>

       </tbody>
    </table>
    
    <table class="totals" cellspacing="0" border="0" style="margin-bottom:5px; border-top: 1px solid #000; border-collapse:
collapse;">
    <tbody>
      <tr>
        <td style="text-align:left; padding-top: 5px;">Total Barang</td>
        <?php
        $id = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT SUM(jumlah_barang)as jumlah_barang FROM tabel_jual WHERE
kode_jual='$id'");

    
        while ($user_data = mysqli_fetch_array($result)) {
          $jumlahbarang = $user_data['jumlah_barang'];
        }
        ?>
        <td style="text-align:right; padding-right:1.5%; border-right: 1px solid #000;font-weight:bold;"><?php echo
$jumlahbarang; ?></td>
        <td style="text-align:left; padding-left:1.5%;">Total</td>
        <?php
        $id = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT SUM(total_jual)as total_jual FROM tabel_jual WHERE
kode_jual='$id'");


        while ($user_data = mysqli_fetch_array($result)) {
          $totalbayar = $user_data['total_jual'];
        }
        include 'rupiah.php';
        ?>
        <td style="text-align:right;font-weight:bold;"><?php echo rupiah1($totalbayar); ?></td>
      </tr>
      <tr>
        <td style="text-align:left; padding-top: 5px; font-weight: bold; border-top: 1px solid #000;">Dibayar dengan : </td>
        <td style="text-align:right; padding-top: 5px; padding-right:1.5%; border-top: 1px solid #000;font-weight:bold;"
colspan="3">
            Cash </td>
        </tr>
        </tbody>
    </table>


    <div style="border-top:1px solid #000; padding-top:10px;">
    
    </div>

    <div id="bkpos_wrp">
       <a href="pos.php?id=<?php echo generateRandomString();?>" style="width:100%; display:block; font-size:12px; text-decoration: none; text-align:center;
color:#FFF; background-color:#005b8a; border:0px solid #007FFF; padding: 10px 1px; margin: 5px auto 10px auto; fontweight:bold;">Kembali ke Toko</a>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
      window.print();
    });
  </script>
  <?php
  function generateRandomString($length = 5)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
       $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  ?>

</body>


</html>