<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['nrp'])) {
          //query SQL
          $nrp_upd = $_GET['nrp'];
          $query = "SELECT * FROM mhs WHERE nrp = '$nrp_upd'"; 
          //eksekusi query
          $result = mysqli_query(connection(),$query);
          $data = mysqli_fetch_array($result);

          $NRP = $data['NRP'];
          $nama = $data['nama'];
          $jenis_kelamin = $data['jenis_kelamin'];
          $alamat = $data['alamat'];
      }  
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Example</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>   
            <div class="form-group">
              
  <form action="update.php" method="POST">
    <tr>
                    <td><?php echo $NRP['nrp'];  ?></td>
                    <td><?php echo $nama['nama'];  ?></td>
                    <td><?php echo $jenis_kelamin['jenis_kelamin'];  ?></td>
                    <td><?php echo $alamat['alamat'];  ?></td>
                  
    </tr>
                           
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>