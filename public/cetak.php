<?php 
session_start();
if (!isset($_SESSION['log'])){
  echo "<script>alert('ANDA HARUS LOGIN DAHULU');document.location.href='Login/Login.php';</script>";
    exit;
    // return var_dump($_SESSION);
}
?>
<?php
include "koneksi.php"; 
$sql = "SELECT * FROM transaksi JOIN user ON transaksi.id_user=user.id_user 
WHERE transaksi.id_transaksi='$_GET[iddetail]'";
// return var_dump($sql);

$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);
// return var_dump($data);

if (!$query) {
die ('SQL Error: ' . mysqli_error($conn));
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



    <div class="container">
   
      <div class="tab-content" id="nav-tabContent">

          <!-- Crewneck -->
          <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Nota Pembelian</h2>
                                </div>
                                <div>
                                <strong><?php echo $data['nama_user'];?></strong>
                                </div>
                                <div>
                                    <p>
                                        <?php echo $data['alamat_user']; ?> <br>
                                        <?php echo $data['no_telepon']; ?> <br>
                                        <?php echo $data['email_user']; ?>
                                
                                    </p>

                                </div>
                                <div>
                                    <p>
                                        Tanggal dan Jam Pembayaran: <?php echo $data['tanggal'];  ?> <br>
                                        Total: Rp.<?php echo number_format($data['total']); ?>
                                    </p>

                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No.</th>
												<th>Nama Produk</th>
												<th>harga</th>
												<th>Jumlah</th>
                                                <th>Sub Total</th>
											</tr></thead>
                                        <tbody>
                                        <?php
                                        include "../koneksi.php"; 
                                        $keranjang = "SELECT * FROM keranjang JOIN produk_crewneck ON keranjang.id_crewneck=produk_crewneck.id_crewneck
                                        WHERE keranjang.id_transaksi='$_GET[iddetail]'";
                                        $detail = mysqli_query($conn, $keranjang);
                                        // return var_dump($keranjang);
                                       
                                        ?>
                                        <?php
                                            $no = 1; //variabel untuk membuat nomor urut
                                            // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                            // kemudian dicetak dengan perulangan while
                                            while($p = mysqli_fetch_assoc($detail))
                                            {

                                            ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $p['nama_crewneck']; ?></td>
                                                    <td><?php echo $p['harga_crewneck']; ?></td>
                                                    <td><?php echo $p['jumlah']; ?></td>
                                                    <td><?php echo number_format ($p['harga_crewneck'] * $p['jumlah']); ?></td>
                                                  
                                                </tr>
                                                <?php
                                                $no++; //untuk nomor urut terus bertambah 1
                                            }
                                            ?> 
        
                                        </tbody>
										</table>
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
    <script type="text/javascript">
        window.print();

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>