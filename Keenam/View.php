<?php
include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/form.css" />         
        <title>List Data Diri</title>
    </head>
    <body>  
    <div class="tabel">
    </div>
    <div class="tabel">
    <table>
            <tr>
                <th>NAMA</th>
                <th>NRP</th>                
                <th>JENIS KELAMIN</th>
                <th>ALAMAT</th>
            </tr>
            <tbody>
            <?php 
                  $query = "SELECT * FROM mhs";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['nrp'];  ?></td>
                    <td><?php echo $data['jenis_kelamin'];  ?></td>
                     <td><?php echo $data['alamat'];  ?></td>
                    <td><a href="<?php echo "edit.php?nrp=".$data['nrp']; ?>">Update</a>&nbsp;&nbsp;</td>
                    <td><a href="<?php echo "delete.php?nrp=".$data['nrp']; ?>"> Delete</a></td>
                  </tr>
                 <?php endwhile ?>
            </tbody>
    </table>
    </div>
    </body>
</html>