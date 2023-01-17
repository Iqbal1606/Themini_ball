
  <!DOCTYPE html>
  <html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Kelompok 7</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <link rel="stylesheet" href="../fowsome/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="../assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand d-inline-flex" href="index.html"><img class="d-inline-block" src="../assets/img/gallery/logo.png" alt="logo" /><span class="text-1000 fs-0 fw-bold ms-2">The Mini Ball</span></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          
          </div>
        </div>
      </nav>
      <section class="py-5 bg-light-gradient border-bottom border-white border-5">
        <div class="bg-holder overlay overlay-light" style="background-image:url(../assets/img/gallery/header-bg.png);background-size:cover;">
        </div>

        <div class="bg-dark py-2">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Produk</h1>
                    <h1 class="display-4 fw-bolder">The Mini Ball</h1>
                <div class="btn-group text-center">
                    <a href="produkhoddie.php" class="btn btn-warning" aria-current="page">Hoodie</a>
                    <a href="produk.php" class="btn btn-primary">Crewneck</a>
                </div>
                    
                </div>
            </div>
        </div>

        <section class="py-3">                 
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 ">

                <?php 
                include "../koneksi.php";
                    $produk = mysqli_query($conn, "SELECT * FROM produk_hoddie order by id_hoddie ASC");
                    if(mysqli_num_rows($produk) > 0){
                      while($p = mysqli_fetch_array($produk)){
                  ?>	
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="detail_hoddie.php?iddetail=<?php echo $p['id_hoddie'] ?>"><img class="card-img-top" src="../admin/gambar/<?php echo $p['gambar'] ?>" alt="..." /></a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $p['nama_hoddie'] ?></h5>
                                    <!-- Product price-->
                                    Rp<?php echo number_format($p['harga_hoddie']) ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Masukan Keranjang</a></div>
                            </div>
                        </div>
                    </div>
                    <?php }}else{ ?>
                      <p>Produk tidak ada</p>
                    <?php } ?>
                  </div>
                   
        </section>


      </section>

      
     

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="../vendors/@popperjs/popper.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../vendors/feather-icons/feather.min.js"></script>
    <script>
      feather.replace();
    </script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  </body>

</html>