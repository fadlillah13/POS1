<?php include "header.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Point Of Sales</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
      <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pilih Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="add_pos.php" method="post" name="form_add">
                <div class="card-body">
                <div class="form-group">
                  <label>Minimal</label>
                  <select class="form-control select2" name="idbarang" style="width: 100%;">
                   <?php 
                   include_once("../koneksi.php");
                   $result = mysqli_query($koneksi,"SELECT *FROM tabel_inventori ORDER BY id_barang DESC");
                   
                   while($user_data = mysqli_fetch_array($result)){
                     echo"<option value=".$user_data['id_barang'].">".$user_data['nama_barang']."</option>";
                   }
                   ?>
                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Beli</label>
                    <input type="text" class="form-control" id="jumlahbeli" name="jumlahbeli" placeholder="Masukan jumlah beli">
                    <input type="hidden" class="form-control" id="kodejual" name="kodejual" value="<?php echo $_GET['id'];?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit"class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Barang Dibeli</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Total Harga</th>
                      <th style="width: 200px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      // panggil semua data dari database
                      include_once("../koneksi.php");
                      $id = $_GET['id'];
                      $result = mysqli_query($koneksi, "SELECT tabel_jual.*, tabel_inventori.nama_barang FROM tabel_jual JOIN tabel_inventori ON tabel_jual.kode_barang=tabel_inventori.kode_barang WHERE kode_jual='$id' ORDER BY id_jual DESC");
                      $no=1;
                      
                        while($user_data = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$no."</td>";
                            echo "<td>".$user_data['kode_barang']."</td>";
                            echo "<td>".$user_data['nama_barang']."</td>";
                            echo "<td>".$user_data['harga_barang']."</td>";
                            echo "<td>".$user_data['jumlah_barang']."</td>";
                            echo "<td>".$user_data['total_jual']."</td>";
                            echo "<td>"."<a href='delete_proses.php?id=$user_data[kode_jual]'><span class='badge bg-danger'>Hapus</span></a>"."</td></tr>";
                            $no++;
                        }
                      ?>
                  </tbody>
                </table>
              </div>
              <div class="card-body">
                <div class="form-group row">
                    <label for="totalbayar" class="col-sm-2 col-form-label">Total Bayar</label>

                    <?php
                    $id = $_GET['id'];
                    $result = mysqli_query($koneksi, "SELECT SUM(total_jual) as total_jual FROM tabel_jual WHERE kode_jual='$id'");

                    while ($user_data = mysqli_fetch_array($result)){
                      $totalbayar = $user_data['total_jual'];
                    }
                    ?>
                    
                    <?php
                    include_once("rupiah.php");
                    ?>
                    <div class="col-sm-10">
                      <input type="text" class="form-control text-right" id="totalbayar" value="<?php echo rupiah1($totalbayar);?>"placeholder="Total Bayar" readonly>
                    </div>
                  </div>
                  <div class="card-footer">
                  <button type="submit" name="submit" onclick="location.href='print_pos.php?id=<?php echo $id=$_GET['id'];?>'"class="btn btn-success">Bayar</button>
                  <button type="submit" name="submit" onclick="location.href='delete_pos.php?id=<?php echo $id=$_GET['id'];?>'"class="btn btn-danger">Batal</button>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.php";?>