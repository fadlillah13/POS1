<?php
include "header.php";
include_once("../koneksi.php");
?>

<?php
//mengambil data dari database berdasarkan url id
$id = $_GET['id'];

$result = mysqli_query($koneksi,"SELECT * FROM admin WHERE id=$id");

while($user_data = mysqli_fetch_array($result)){
 $id  = $user_data['id'];
 $username  = $user_data['username'];
 $password   = $user_data['password'];
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> UPDATE DATA USER</h1>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">form update data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="edituser_proses.php" method="post" name="form_update"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="id">id</label>
                    <input type="text" name="id" class="form-control"  placeholder="Enter id" value="<?php echo $id; ?>">

                  </div>
                  <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" class="form-control"  placeholder="Enter username" value="<?php echo $username; ?>">
                  </div>
                  <div class="form-group">
                    <label for="hargabeli">password</label>
                    <input type="password" name="password" class="form-control"  placeholder="Enter password" value="<?php echo $password; ?>">
                  </div>
                 
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-warning">UPDATE</button>
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


<?php include "footer.php"; ?>