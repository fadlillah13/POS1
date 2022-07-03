<?php
include "header.php";
include_once("../koneksi.php");

//mengambil data dari database berdasarkan url id
$id = $_GET['id'];

$result = mysqli_query($koneksi, "SELECT * FROM tabel_inventori ORDER BY id_barang=$id");
$no=1;
                      
while($user_data = mysqli_fetch_array($result)){
    $kodebarang = $user_data['kode_barang'];
    $namabarang = $user_data['nama_barang'];
    $hargabeli = $user_data['harga_beli'];
    $hargajual = $user_data['harga_jual'];
    $stokbarang = $user_data['stok_barang'];
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Barang</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Update Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="edit_proses.php"method="post" name="form_update">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kodebarang">Kode Barang</label>
                    <input type="text" name="kodebarang"class="form-control" placeholder="Enter Kode Barang"value="<?php echo $kodebarang ?>"readonly>
                  </div>
                  <div class="form-group">
                    <label for="namabarang">Nama Barang</label>
                    <input type="text" name="namabarang" class="form-control" placeholder="Enter Nama Barang"value="<?php echo $namabarang ?>">
                  </div>
                  <div class="form-group">
                    <label for="hargabeli">Harga Beli</label>
                    <input type="text" name="hargabeli" class="form-control" placeholder="Enter Harga Barang"value="<?php echo $hargabeli ?>">
                  </div>
                  <div class="form-group">
                    <label for="hargajual">Harga Jual</label>
                    <input type="text" name="hargajual" class="form-control" placeholder="Enter Harga Jual"value="<?php echo $hargajual ?>">
                  </div>
                  <div class="form-group">
                    <label for="stokbarang">Stok Barang</label>
                    <input type="text" name="stokbarang" class="form-control" placeholder="Enter Stok Barang"value="<?php echo $stokbarang ?>">
                    <input type="hidden" name="idbarang" class="form-control" value="<?php echo $_GET['id']; ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="Update" class="btn btn-primary">Update</button>
                  <button type="button" onclick="location.href='inventori.php';" name="Submit" class="btn btn-success">Kembali</button></a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "footer.php";?>