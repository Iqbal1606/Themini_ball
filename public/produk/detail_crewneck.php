<?php 
session_start();
include "../koneksi.php";
$id_produk = $_GET["iddetail"];
$produk = mysqli_query($conn, "SELECT * FROM produk_crewneck where id_crewneck= $id_produk");
// return var_dump($produk);
$data = mysqli_fetch_assoc($produk);
?>
<!doctype html>
<html lang="en">
    
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Mini Ball</title>

    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <link rel="stylesheet" href="../fowsome/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <!-- CSS -->
    <link href="../assets/css/theme.css" rel="stylesheet" />
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #EFEFEF;">
      <div class="container">
      <a class="navbar-brand d-inline-flex" href="index.php"><img class="d-inline-block" src="../assets/img/gallery/logo.png" alt="logo" /><span class="text-1000 fs-0 fw-bold ms-2">The Mini Ball</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item px-2"><a class="nav-link fw-medium" href="index.php">Home</a></li>
            <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="produk.php" href="login.php">Produk</a></li>
           
          </ul>
        </div>
       
      </div>
    </nav>

      <section class="kontent">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
            <img src="../admin/gambar/<?php echo $data["gambar"] ?>" alt="" class="img-responsive">
            </div>
              <div class="col-md-6">
              <h1>DETAIL PRODUK</h1>
              <H2>"<?php echo $data["nama_crewneck"] ?>"</H2>
              <h4> Rp<?php echo number_format($data['harga_crewneck']) ?></h4>
              <h5>Keterangan:</h5>
              <h5><?php echo $data["deskripsi_crewneck"] ?></h5>
              <form action="" method="post">
                <div class="form-group"> 
                  <div class="input-group">
                    <input type="number" min="1"  placeholder="Masukan Jumlah yang Dibeli" class="form-control" name="jumlah"> 
                    <div class="input-group-btn">
                      <button class="btn btn-danger btn-md" name="beli">Beli</button> 

                    </div>
                  </div> 
                </div>
              </form>
              <?php 
              if(isset($_POST["beli"]))
              {
               //mendapatkan jumlah yang diinputkan
                $jumlah=$_POST["jumlah"];
                //masukan di keranjang.php
                $_SESSION["keranjang"][$id_produk] = $jumlah;
                echo "<script>alert('Produk Berhasil Ditambahkan ke Keranjang');document.location.href='../keranjang.php';</script>";
              }
              ?>

            </div>

          </div>

        </div>

      </section>

    

      
      
    </div>

    <!-- End Kategori -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>