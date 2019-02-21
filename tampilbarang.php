
<?php
include('connection.php');
include('template/header.php');
$result = mysqli_query($db_connection, "SELECT * FROM tb_barang ORDER BY nama_barang ASC");
?>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product <?php echo $_SESSION['nama']; ?> </h1>
      </div>
      	<a class='btn btn-success' href="tambahbarang.php">Tambah Barang</a> 
      	<br></br>
        <table class='table table-bordered'>
        	<tr>
        		<th>No</th>
        		<th>Nama</th>
        		<th>Gambar</th>
        		<th>Harga</th>
        	</tr>
<?php  
    $no = 1;
    while($row = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$row['nama_barang']."</td>";
        echo "<td><img width='100px' src='gambar/".$row['gambar']."' class='img'></td>";
        echo "<td>IDR : ".$row['harga']."</td>";    
        echo "</tr>";
        $no++;      
    }
?>

        </table>

    </main>


<?php
include('template/footer.php');
?>


