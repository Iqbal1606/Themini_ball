<?php 
session_start();
if (!isset($_SESSION['log'])){
  echo "<script>alert('ANDA HARUS LOGIN DAHULU');document.location.href='Login/Login.php';</script>";
    exit;
    // return var_dump($_SESSION);
}
include "koneksi.php";
if(empty ($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])){
  echo "<script>alert('Keranjang Kosong,Silahkan Belanja Dahulu');document.location.href='produk/produk.php';</script>";  
}
// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";
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
      <a class="navbar-brand d-inline-flex" href="index.php"><img class="d-inline-block" src="assets/img/gallery/logo.png" alt="logo" /><span class="text-1000 fs-0 fw-bold ms-2">The Mini Ball</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item px-2"><a class="nav-link fw-medium" href="index.php">Home</a></li>
            <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="produk/produk.php" href="login.php">Produk</a></li>
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
          <h2 class="text-center">Selamat datang di keranjang anda</h2>
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
                        <th>Aksi</th>

											</tr></thead><tbody>
                      <?php 
                      foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                      <?php 
                        $produk = mysqli_query($conn, "SELECT * FROM produk_crewneck where id_crewneck= $id_produk");
                        // return var_dump($produk);
                        $data = mysqli_fetch_assoc($produk);
                        $total = $data["harga_crewneck"] * $jumlah ;
                        
                      ?>
                       
                          <td>><?php echo $data['id_crewneck'] ?></td>
                          <td><?php echo $data['nama_crewneck'] ?></td>
                          <td> Rp<?php echo number_format($data['harga_crewneck']) ?></td>
                          <td><?php echo $jumlah ;?></td>
                          <td> Rp<?php echo number_format($total) ?></td>
                          <td><a style="margin-bottom:5px" data-toggle="modal" href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-info">Hapus</a></td>
                        </tr>
                        <?php endforeach ?>
                                 
                    
                      </tbody>
										</table>
                    <br>
                    <a style="margin-bottom:20px" data-toggle="modal" href="chekout.php" class="btn btn-info col-md-2">Chekout</a>
                    <a style="margin-bottom:20px" data-toggle="modal" href="produk/produk.php" class="btn btn-info col-md-2">Tambah Produk</a>
                                    </div>
								 </div>
                            </div>
                        </div>
                    </div>
                </div>
              

        </div>
      </div>
    </div>

    <!-- End Kategori -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>