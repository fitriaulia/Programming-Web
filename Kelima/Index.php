<!DOCTYPE html>
<html lang="en" id="home">
<?php 
  include ('conn.php'); 
  $status = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $npm = $_POST['npm'];
      $name = $_POST['name'];
      $address = $_POST['address'];
  //query SQL
  $query = "INSERT INTO biodata (npm,name,address)";
   $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }
?>
  <head>
    <title>Web Form Fitri</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Programming Web</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
               <li class="nav-item">
                <a class="nav-link active" href="<?php echo "index.php"; ?>">All Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "form.php"; ?>">Add Data</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Successfully save data</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Failed to save data</div>';
              }
            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Mahasiswa</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>NPM</th>
                  <th>Name</th>
                  <th>Address</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM portofolio";
                  $result = mysqli_query(connection(),$query);
                 ?>

                  <?php if(isset($data['nama'])) { ?>
                   
                   <?php }else{ ?>
                     <?php while($data = mysqli_fetch_array($result)): ?>
                      <tr>
                        <td><?php echo $data['npm'];  ?></td>
                        <td><?php echo $data['name'];  ?></td>
                        <td><?php echo $data['address'];  ?></td>
                        <td>
                          <a href="<?php echo "update.php?npm=".$data['npm']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                          &nbsp;&nbsp;
                          <a href="<?php echo "delete.php?npm=".$data['npm']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                        </td>
                      </tr>
                 <?php endwhile ?>
                 <?php ?>
              </tbody>
            </table>
        </div>