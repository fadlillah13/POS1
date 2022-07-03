<?php include "header.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Barang</h1>
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
                <h3 class="card-title">Form Tambah Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="add.php"method="post" name="form_add">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kodebarang">Kode Barang</label>
                    <input type="text" name="kodebarang"class="form-control" placeholder="Enter Kode Barang"value="<?php echo generateRandomString()?>"readonly>
                  </div>
                  <div class="form-group">
                    <label for="namabarang">Nama Barang</label>
                    <input type="text" name="namabarang" class="form-control" placeholder="Enter Nama Barang">
                  </div>
                  <div class="form-group">
                    <label for="hargabeli">Harga Beli</label>
                    <input type="text" name="hargabeli" class="form-control" placeholder="Enter Harga Barang">
                  </div>
                  <div class="form-group">
                    <label for="hargajual">Harga Jual</label>
                    <input type="text" name="hargajual" class="form-control" placeholder="Enter Harga Jual">
                  </div>
                  <div class="form-group">
                    <label for="stokbarang">Stok Barang</label>
                    <input type="text" name="stokbarang" class="form-control" placeholder="Enter Stok Barang">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
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

  <?php
  if(isset($_POST['Submit'])){
    $kodebarang =$_POST['kodebarang'];
    $namabarang =$_POST['namabarang'];
    $hargabeli =$_POST['hargabeli'];
    $hargajual =$_POST['hargajual'];
    $stokbarang =$_POST['stokbarang'];

    //koneksi kedatabase
    include_once("../koneksi.php");

    //insert data ke database
    $result = mysqli_query($koneksi,"INSERT INTO tabel_inventori(kode_barang,nama_barang,harga_beli,harga_jual,stok_barang) VALUES('$kodebarang','$namabarang','$hargabeli','$hargajual','$stokbarang')");
  }
  ?>
  <?php include "footer.php";?>