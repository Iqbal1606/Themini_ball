<?php 
session_start ();
$id_produk = $_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('Produk Berhasil Di Hapus Dari Keranjang Anda');document.location.href='keranjang.php';</script>"; 
?>