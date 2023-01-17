<?php 
date_default_timezone_set("Asia/Jakarta");
session_start();
include "koneksi.php";
if (!isset($_SESSION['log'])){
    // return var_dump($_SESSION);
  echo "<script>alert('ANDA HARUS LOGIN DAHULU');document.location.href='Login/Login.php';</script>";
//   return var_dump($_SESSION['log'])
    exit;
   
}
include "koneksi.php";
if(empty ($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])){
  echo "<script>alert('Keranjang Kosong,Silahkan Belanja Dahulu');document.location.href='produk/produk.php';</script>";  
}
?>

<!doctype html>
<html lang="en">
    
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Mini Ball</title>

    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <link rel="stylesheet" href="fowsome/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <!-- CSS -->
    <link href="assets/css/theme.css" rel="stylesheet" />
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #EFEFEF;">
      <div class="container">
      <a class="navbar-brand d-inline-flex" href="index.html"><img class="d-inline-block" src="assets/img/gallery/logo.png" alt="logo" /><span class="text-1000 fs-0 fw-bold ms-2">The Mini Ball</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item px-2"><a class="nav-link fw-medium" href="index.php">Home</a></li>
            <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="produk/produk.php" href="keranjang.php">Keranjang</a></li>
            <li class="nav-item px-2"><a class="nav-link fw-medium" href="logout.php">Logout</a></li>
          </ul>
        </div>
       
      </div>
    </nav>

    <!-- End Navbar -->

    <!-- Kategori -->

    <div class="container">
      <div class="row mt-7 mb-7">
        <div class="col">
          <h2 class="text-center">Chekout Produk</h2>
        </div>
      </div>

      <div class="tab-content" id="nav-tabContent">

          <!-- Crewneck -->
          <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Daftar Produk Anda</h2>
									
                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>id_produk</th>
												<th>Nama produk</th>
												<th>harga</th>
                        <th>Jumlah</th>
                        <th>total</th>
                                               

											</tr></thead><tbody>
                                                <?php $totalbelanja= 0; ?>
                                                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                                                <?php 
                                                    $produk = mysqli_query($conn, "SELECT * FROM produk_crewneck where id_crewneck= $id_produk");
                                                    // return var_dump($produk);
                                                    $data = mysqli_fetch_assoc($produk);
                                                    $total = $data["harga_crewneck"] * $jumlah ;
                                                    
                                                ?>
                                                
                                                    <td><?php echo $data['id_crewneck'] ?></td>
                                                    <td><?php echo $data['nama_crewneck'] ?></td>
                                                    <td> Rp<?php echo number_format($data['harga_crewneck']) ?></td>
                                                    <td><?php echo $jumlah ;?></td>
                                                    <td> Rp<?php echo number_format($total) ?></td>
                                                    
                                                    </tr>
                                                    <?php $totalbelanja+=$total; ?>
                                                    <?php endforeach ?>
                                 
                    
                                            </tbody>
                                            <tr>
                                                <th colspan="4">Total Belanja</th>
                                                <th>Rp. <?php echo number_format($totalbelanja)?></th>
                                            </tr>
										</table>
                            
                                    </div>

                                  
								 </div>
                            </div>
                        </div>
                           
                    </div>
                    <form method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" readonly value="<?php echo $_SESSION['log']['nama_user'] ?>" class="form-control">

                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                             <input type="text" readonly value="<?php echo $_SESSION['log']['no_telepon'] ?>" class="form-control">

                                        </div>  
                                    </div>

                                    <div class="col-md-4">
                                        <select class="form-control" name="id_cara_pembayaran" >
                                            <option value="">Pilih Cara Pembayaran</option>
                                            <?php 
                                            include "koneksi.php";
                                            $sql =  mysqli_query($conn, "SELECT * FROM cara_pembayaran");
                                            while($data = mysqli_fetch_assoc($sql)){
                                            ?>
                                            <option value="<?php echo $data['id_cara_pembayaran'] ?>"><?php echo $data['nama_pembayaran'] ?>-<?php echo $data['no_pembayaran'] ?></option>
                                            
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <br><br>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Cantumkan Bukti Pembayaran</label>
                                        <input name="gambar" type="file" class="form-control" required autofocus>
                                      </div>
                                    </div>

                                    </div>

                                                

                                 </div>
                                 <br><br>
                               
                                 <button class="btn btn-warning" name="bayar">Lanjutkan Pembayaran</button>

                    </form>
                    
                    <?php 
                    if (isset($_POST["bayar"]))
                    {
                        $id_user = $_SESSION['log']['id_user'];
                        $id_cara_bayar = $_POST["id_cara_pembayaran"];
                        $tanggalbeli = date("y-m-d H:i:s");
                        $total_transaksi =  $totalbelanja;
                        $ekstensi_diperbolehkan	= array('png','jpg');
                          $nama = $_FILES['gambar']['name'];
                          $x = explode('.', $nama);
                          $ekstensi = strtolower(end($x));
                          $ukuran	= $_FILES['gambar']['size'];
                          $file_tmp = $_FILES['gambar']['tmp_name'];	
                            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                                if($ukuran < 1044070){			
                              move_uploaded_file($file_tmp, 'admin/gambar/'.$nama);
                              $query =  mysqli_query($conn,"INSERT INTO `transaksi`( `id_user`, `id_cara_pembayaran`, `total`, `tanggal`,`gambar`) VALUES ('$id_user','$id_cara_bayar','$total_transaksi','$tanggalbeli','$nama')");
                              if($query){
                                $id_pembelian_barusan = $conn->insert_id;
                                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
                                {
                                   mysqli_query($conn,"INSERT INTO `keranjang`(`id_transaksi`, `id_crewneck`, `jumlah`) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah')");
                                      // return var_dump($keranjang);
            
                                }
                                //mengosongkan keranjan
                                unset($_SESSION["Keranjang"]);
                                echo "<script>alert('Pembelihan Sukses');document.location.href='nota.php?iddetail=$id_pembelian_barusan';</script>"; 
                              }else{
                                echo 'GAGAL MENGUPLOAD GAMBAR';
                              }
                                }else{
                              echo 'UKURAN FILE TERLALU BESAR';
                                }
                                }else{
                            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                                }
                            









                       
                        
                        
                        
                      



                        
                    }
                    ?>   
                                             
                </div>
              

        </div>
      </div>
    </div>

    <!-- End Kategori -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>