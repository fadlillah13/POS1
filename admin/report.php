<?php include "header.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Report Penjualan</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">

              <?php
              include_once("../koneksi.php");
              $result = mysqli_query($koneksi,"SELECT kode_jual, COUNT(kode_jual) as total_order FROM tabel_jual GROUP BY kode_jual");
              $totalOrder = 0;
              while($user_data = mysqli_fetch_array($result)){
                $totalOrder += $user_data['total_order'];
              }
              ?>
                <h3><?php echo $totalOrder; ?></h3>

                <p>Jumlah Order</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">

              <?php
              include_once("rupiah.php");
              $result = mysqli_query($koneksi,"SELECT SUM(total_laba) as total_laba FROM tabel_jual");

              while($user_data = mysqli_fetch_array($result)){
                $total_laba = $user_data['total_laba'];
              }
              ?>
                <h3><?php echo rupiah1($total_laba); ?></h3>

                <p>Jumlah Laba</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">

              <?php
              $result = mysqli_query($koneksi,"SELECT COUNT(kode_barang) as total_barang FROM tabel_inventori");

              while($user_data = mysqli_fetch_array($result)){
                $totalbarang = $user_data['total_barang'];
              }
              ?>
                <h3><?php echo $totalbarang; ?></h3>

                <p>Jumlah Barang</p>
              </div>
              <div class="icon">
                <i class="fas fa-box"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">

              <?php
              $result = mysqli_query($koneksi,"SELECT SUM(stok_barang) as total_stok FROM tabel_inventori");

              while($user_data = mysqli_fetch_array($result)){
                $totalstok = $user_data['total_stok'];
              }
              ?>
                <h3><?php echo $totalstok; ?></h3>

                <p>Jumlah Stok</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
        <div class="col-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Penjualan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.Invoice</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Harga Barang</th>
                    <th>Total Jual</th>
                    <th>Total Laba</th>
                  </tr>
                  </thead>
                <tbody>
                 <?php
                 include_once("../koneksi.php");
                 $result = mysqli_query($koneksi,"SELECT tabel_jual.*,tabel_inventori.nama_barang FROM tabel_jual JOIN 
                 tabel_inventori ON tabel_jual.kode_barang=tabel_inventori.kode_barang ORDER BY id_jual DESC");

                 while($user_data=mysqli_fetch_array($result)){
                  $dt = new DateTime($user_data['tanggal_jual']);
                  $date = $dt->format('d/m/y');
                  echo "<tr>";
                  echo "<td>".$user_data['kode_jual']."</td>";
                  echo "<td>".$date."</td>";
                  echo "<td>".$user_data['nama_barang']."</td>";
                  echo "<td>".$user_data['jumlah_barang']."</td>";
                  echo "<td>".$user_data['harga_barang']."</td>";
                  echo "<td>".$user_data['total_jual']."</td>";
                  echo "<td>".$user_data['total_laba']."</td>";

                 }
                 ?>
                 </tr>
                </tbody>
            </table>
        </div>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.php";?>