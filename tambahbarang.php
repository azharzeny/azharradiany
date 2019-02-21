<?php 
include('template/header.php');
include('connection.php');
$category_data = mysqli_query($db_connection, "SELECT * FROM tb_kategori_barang ORDER BY kategori_barang DESC");
if(isset($_POST['tombol']))
{
    $lokasi_file = $_FILES['gambar']['tmp_name'];
    $nama_file   = $_FILES['gambar']['name'];
    $acak        = rand(1,999999);
    $nama_file_unik = $acak.$nama_file;


    $dir_upload  = "gambar/";
    $file_upload = $dir_upload.$nama_file_unik;
    if(move_uploaded_file($lokasi_file, $file_upload))
    {
      $kd_kategori_barang = $_POST['kd_kategori_barang'];
      $nama_barang = $_POST['nama_barang'];
      $gambar = $nama_file_unik;
      $harga = $_POST['harga'];


      $insert_data = mysqli_query($db_connection, "insert into tb_barang (kd_kategori_barang,nama_barang,gambar,harga) values ('$kd_kategori_barang','$nama_barang','$gambar','$harga')");
      if($insert_data)
      {
        header("location:tampilbarang.php");
      }
      else
      {
        $error = "Add File Failed";
      }


    }
    else
    {
      $error = "Upload File Failed";
    }


}
?>



    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Barang</h1>
        </div>


        <form action="" id="form_barang" enctype="multipart/form-data" method="post" class="form-horizontal">


          <div class="form-group">
            <label for="inputNama" class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
              <select name="kd_kategori_barang" id="kd_kategori_barang" class="form-control">
              <?php
                while($row = mysqli_fetch_array($category_data))
                {
                  ?>
                  <option value="<?php echo $row['kd_kategori_barang']; ?>"><?php echo $row['kategori_barang']; ?></option>
                  <?php
                }  
              ?>
              </select>
            </div>
          </div>




          <div class="form-group">
            <label for="inputalamat" class="col-sm-2 control-label">Product Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_barang" id="nama_barang">
            </div>
          </div>



          <div class="form-group">
            <label for="inputalamat" class="col-sm-2 control-label">Picture</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="gambar" id="gambar">
            </div>
          </div>

          <div class="form-group">
            <label for="inputalamat" class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="harga" id="harga">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="tombol" class="btn btn-primary">Add</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </div>
          </div>
        </form>
        
      
    </main>
<?php 
include('template/footer.php');
?>