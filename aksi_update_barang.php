<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['ID_BARANG'];
  $idsupp = $_POST['ID_SUPPLIER'];
  $namabrg = $_POST['NAMA_BRG'];
  $jenisbrg = $_POST['JENIS_BRG'];
  $hargabrg = $_POST['HARGA_BRG'];
  $jmlhstok = $_POST['JMLH_STOK'];
  $tglkadaluarsa = $_POST['TGL_KADALUARSA'];
  
   // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  barang  SET ID_SUPPLIER='".$idsupp."', NAMA_BRG ='".$namabrg."', JENIS_BRG ='".$jenisbrg."', HARGA_BRG ='".$hargabrg."', JMLH_STOK ='".$jmlhstok."',  TGL_KADALUARSA ='".$tglkadaluarsa."' WHERE  ID_BARANG= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Barang berhasil diubah'); window.location.href='barang.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Barang gagal diubah'); window.location.href='barang.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: barang.php'); 
}