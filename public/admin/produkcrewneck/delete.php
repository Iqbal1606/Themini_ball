<?php
   $servername = "127.0.0.1";
   $database = "theminiball"; 
   $username = "root";
   $password = ""; 
   $conn = mysqli_connect($servername, $username, $password, $database);

    $id_crewneck = $_GET["idcrewneck"];
    // return var_dump($id_crewneck);
    $query_del = "DELETE FROM `produk_crewneck` WHERE  id_crewneck= '$id_crewneck' ";
    $hasil_query = mysqli_query($conn, $query_del);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
    }
?>