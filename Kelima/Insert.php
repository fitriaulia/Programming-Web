<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
  $status = '';
  
//melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nrp = $_POST['nrp'];
      $nama = $_POST['nama'];
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $alamat = $_POST['alamat'];
//query SQL
	$query = "INSERT INTO mhs (nrp, nama, jenis_kelamin, alamat) VALUES('$nrp','$nama','$jenis_kelamin','$alamat')"; 