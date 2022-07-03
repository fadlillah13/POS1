<?php include "header.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inventori Barang</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Inventori</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Harga beli</th>
                      <th>Harga Jual</th>
                      <th>Stok Barang</th>
                      <th style="width: 200px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      // panggil semua data dari database
                      include_once("../koneksi.php");
                      $result = mysqli_query($koneksi, "SELECT * FROM tabel_inventori ORDER BY id_barang DESC");
                      $no=1;
                      
                        while($user_data = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$no."</td>";
                            echo "<td>".$user_data['kode_barang']."</td>";
                            echo "<td>".$user_data['nama_barang']."</td>";
                            echo "<td>".$user_data['harga_beli']."</td>";
                            echo "<td>".$user_data['harga_jual']."</td>";
                            echo "<td>".$user_data['stok_barang']."</td>";
                            echo "<td>"."<a href='edit.php?id=$user_data[id_barang]'><span class='badge bg-success'>Edit</span></a> <a href='delete_proses.php?id=$user_data[id_barang]'><span class='badge bg-danger'>Hapus</span></a>"."</td>";
                            $no++;
                        }
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.row (main row) -->
        </div>
        <a href="add.php"><button type="button" class="btn btn-block btn-primary btn-flat col-2 float-right">Tambah</button></a>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.php";?>