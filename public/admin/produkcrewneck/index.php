<?php
include "../../koneksi.php";
$sql = "SELECT * FROM produk_crewneck order by id_crewneck ASC ";

$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);
// return var_dump($data);

if (!$query) {
die ('SQL Error: ' . mysqli_error($conn));
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola Produk - Tokopekita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
	
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
							<li><a href="index.php"><span>Home</span></a></li>
							<li><a href="../"><span>Kembali ke Toko</span></a></li>
							
							<li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Toko
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="produkcrewneck/">Produk Crewneck</a></li>
                                    <li><a href="../produkhoddie/">Produk Hoddie</a></li>
                                    <li><a href="../data_pembelian.php">Data Pembelian</a></li>
									<li><a href="../pembayaran.php">Metode Pembayaran</a></li>
                                </ul>
                            </li>
							<li><a href="../customer.php"><span>Kelola Pelanggan</span></a></li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>
                                
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            
            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Daftar Produk Crewneck</h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Produk</button>
                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No.</th>
												<th>Nama Crewneck</th>
												<th>Deskripsi</th>
												<th>Harga</th>
												<th>Gambar</th>
                                                <th>Aksi</th>
											</tr></thead><tbody>
                                            <?php
                                            $no = 1; //variabel untuk membuat nomor urut
                                            // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                            // kemudian dicetak dengan perulangan while
                                            while($data = mysqli_fetch_assoc($query))
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['nama_crewneck']; ?></td>
                                                <td><?php echo $data['deskripsi_crewneck']; ?></td>
                                                <td>Rp <?php echo number_format($data['harga_crewneck']); ?></td>
                                                <td><img src="../gambar/<?php echo $data['gambar'] ?>" width="20%"\></td>
                                                <td>
                                                    <a href="update.php?id=<?php echo $data['id_crewneck']; ?>">Edit</a> |
                                                    <a href="delete.php?idcrewneck=<?php echo $data['id_crewneck'];?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                                   
                                                </td>
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
              
                
                <!-- row area start-->
            </div>
        </div>

    </div>
    <!-- page container area end -->
	
	<!-- modal input -->
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Produk</h4>
						</div>
						
						<div class="modal-body">
						<form action="" method="post" enctype="multipart/form-data" >
								<div class="form-group">
									<label>Nama Creawneck</label>
									<input name="nama_crewneck" type="text" class="form-control" required autofocus>
								</div>
							
								<div class="form-group">
									<label>Deskripsi</label>
									<input name="deskripsi_crewneck" type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Harga Produk</label>
									<input name="harga_crewneck" type="number" class="form-control">
								</div>
                                <div class="form-group">
									<label>Gambar</label>
									<input name="gambar" type="file" class="form-control" required autofocus>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input name="uplod" type="submit" class="btn btn-primary" value="Tambah">
							</div>
						</form>
                        <?php 

                        include '../../koneksi.php';
                        if(isset($_POST['uplod'])){
                            // Mengambil data dari form lalu ditampung didalam variabel
                        $nama_crewneck = $_POST['nama_crewneck'];
                        $deskripsi_crewneck = $_POST['deskripsi_crewneck'];
                        $harga_crewneck = $_POST['harga_crewneck'];
                        $gambar = $_FILES['gambar']['name'];
                        $foto_size = $_FILES['gambar']['size'];

                        // Mengecek apakah file lebih besar 2 MB atau tidak
                        if ($foto_size > 2097152) {
                            // Jika File lebih dari 2 MB maka akan gagal mengupload File
                            header("location:index.php?pesan=size");
                        }else{

                            // Mengecek apakah Ada file yang diupload atau tidak
                            if ($gambar != "") {

                                // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
                                $ekstensi_izin = array('png','jpg','jepg');
                                // Memisahkan nama file dengan Ekstensinya
                                $pisahkan_ekstensi = explode('.', $gambar); 
                                $ekstensi = strtolower(end($pisahkan_ekstensi));
                                // Nama file yang berada di dalam direktori temporer server
                                $file_tmp = $_FILES['gambar']['tmp_name'];   
                                // Membuat angka/huruf acak berdasarkan waktu diupload
                                $tanggal = md5(date('Y-m-d h:i:s'));
                                // Menyatukan angka/huruf acak dengan nama file aslinya
                                $foto_nama_new = $tanggal.'-'.$foto_nama; 

                                // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
                                if(in_array($ekstensi, $ekstensi_izin) === true)  {
                                    // Memindahkan File kedalam Folder "FOTO"
                                    move_uploaded_file($file_tmp, '../gambar/'.$foto_nama_new);

                                    // Query untuk memasukan data kedalam table SISWA
                                    $query = mysqli_query($conn, "INSERT INTO produk_crewneck VALUES ('','$nama_crewneck', '$deskripsi_crewneck', '$harga_crewneck', '$foto_nama_new')");

                                    // Mengecek apakah data gagal diinput atau tidak
                                    if($query){
                                        echo "<br><meta http-equiv='refresh' content='5; URL=../produkcrewneck/'> You will be redirected to the form in 1 seconds";
                                    } else {
                                        echo "Sorry, there's a problem while submitting.";
                                        echo "<br><meta http-equiv='refresh' content='5; URL=../produkcrewneck/'> You will be redirected to the form in 1 seconds";
                                    }

                                } else { 
                                    echo "Sorry, there's a problem while uploading the file.";
                                    echo "<br><meta http-equiv='refresh' content='5; URL=../produkcrewneck/'> You will be redirected to the form in 1 seconds";      }

                            }

                        }  
                    
                        };

                        
                        ?>
					</div>
				</div>
			</div>
	
	<script>
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>
	
	<!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>
		<!-- Start datatable js -->
	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
	
</body>
</html>
