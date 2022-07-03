<?php include "header.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> USER</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
   <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Data User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th style="width: 200px">aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    // panggil semua data dari database
                    include_once("../koneksi.php");
                    $result = mysqli_query($koneksi, "SELECT *FROM admin ORDER BY id DESC");
                    $no=1;

                    while($user_data = mysqli_fetch_array($result)){
                      echo "<tr>";
                      echo "<td>".$no."</td>";
                      echo "<td>".$user_data['id']."</td>";
                      echo "<td>".$user_data['username']."</td>";
                      echo "<td>".$user_data['password']."</td>";
                      echo "<td>"."<a href='useredit.php?id=$user_data[id]'><span class='badge bg-success'>Edit</span></a>  <a href='userdelete_proses.php?id=$user_data[id]'<span class='badge bg-danger'>Hapus</span></a>"."</td></tr>";
                      $no++;

                    }
                    ?>
                  </tbody>
                </table>
              </div>  
          </div>
      </div>
    </div>
    <a href="adduser.php"><button type="button" class="btn btn-block btn-primary btn-flat col-2 float-right">tambah</button></a>
 </div>
</section>
  </div>
  <!-- /.content-wrapper -->
  
<?php include "footer.php"; ?>