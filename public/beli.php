<?php 
session_start();
//mendapatkan id dari url
$id_produk = $_GET['id'];
//jk sudah ada produk itu dikeranjanng, maka produk itu jumlahnya +1
if(isset($_SESSION['keranjang'][$id_produk])){
    $_SESSION['keranjang'][$id_produk]+=1;
}
//kalau tidak dikeranjang mka diangap dibeli 1
else{
    $_SESSION['keranjang'][$id_produk] = 1;
}

echo "<script>alert('Produk Berhasil Ditambahkan');document.location.href='keranjang.php';</script>";
?>