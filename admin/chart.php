<?php include "header.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Chart</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <html>
    <head>
        <title>ChartJS</title>
        <script src="../assets/chartjs/Chart.bundle.js"></script>
        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
    </head>
   <body>

<?php
    $conn = new mysqli('localhost', 'root', '', 'siamib');
    $sql = "SELECT * FROM tabel_jual";
    $tanggal_jual = $conn->query($sql);
    $jumlah_barang = $conn->query($sql);
  ?>

        <div class="container">
            <canvas id="myChart" width="50" height="50"></canvas>
        </div>
        <canvas id="myChart" width="100" height="100"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php while($b = mysqli_fetch_array($tanggal_jual)) { echo '"' . $b['tanggal_jual'] . '",'; } ?>],
        datasets: [{
            label: 'Barang Perbulan',
            data: [<?php while($a = mysqli_fetch_array($jumlah_barang)) { echo $a['jumlah_barang'] . ', '; } ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 0
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.php";?>