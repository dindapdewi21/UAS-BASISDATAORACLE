<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['ID_TRANSAKSI'];
  $ID_KASIR = $_POST['ID_KASIR'];
  $ID_KUSTOMER= $_POST['ID_KUSTOMER'];
  $TGL_TRANSAKSI = $_POST['TGL_TRANSAKSI'];
  $NAMA_TRANSAKSI = $_POST['NAMA_TRANSAKSI'];
  $HARGA_TRANSAKSI = $_POST['HARGA_TRANSAKSI'];
  $JUMLAH_BARANG = $_POST['JMLH_BRG'];
  $TOTAL_PEMBAYARAN = $_POST['TOTAL_PEMBAYARAN'];
 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "INSERT INTO transaksi (ID_TRANSAKSI,ID_KASIR,ID_KUSTOMER,TGL_TRANSAKSI,NAMA_TRANSAKSI,HARGA_TRANSAKSI,JMLH_BRG,TOTAL_PEMBAYARAN) VALUES ('".$id."','".$ID_KASIR."','".$ID_KUSTOMER."','".$TGL_TRANSAKSI."','".$NAMA_TRANSAKSI."','".$HARGA_TRANSAKSI."','".$JUMLAH_BARANG."','".$TOTAL_PEMBAYARAN."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Transaksi berhasil ditambah'); 
	window.location.href='Transaksi.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Transaksi gagal ditambah'); 
	window.location.href='Transaksi.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: Transaksi.php'); 
}