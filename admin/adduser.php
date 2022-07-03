<?php include "header.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> TAMBAH USER</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">TAMBAH USER</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
   <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">form tambah data user</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="adduser.php" method="post" name="form_adduser"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" name="id" class="form-control"  placeholder="Enter id"> 
                  </div>
                  <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" class="form-control"  placeholder="Enter username">
                  </div>
                  <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" class="form-control"  placeholder="Enter password">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Submit" class="btn btn-primary">TAMBAH</button>
                  <button type="button" onclick="location.href='user.php'" name="Submit" class="btn btn-success">BACK</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
</section>
  </div>
  <!-- /.content-wrapper -->
<?php

if (isset($_POST['Submit'])){
  $id  = $_POST['id'];
  $username  = $_POST['username'];
  $password   = $_POST['password'];

  //koneksi ke database
  include_once("../koneksi.php");

  //insert data ke database
  $result = mysqli_query($koneksi,"INSERT INTO admin(id,username,password) VALUES ('$id','$username','$password')");
}
?>

<?php include "footer.php"; ?>