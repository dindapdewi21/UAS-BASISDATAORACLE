<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['ID_SUPPLIER'];
  $namasupp = $_POST['NAMA_SUPP'];
  $almtsupp= $_POST['ALMT_SUPP'];
  $tlpsupp = $_POST['TLP_SUPP'];
  $tgldtg = $_POST['TGL_DATANG'];
 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  supplier  SET NAMA_SUPP='".$namasupp."', ALMT_SUPP ='".$almtsupp."', TLP_SUPP ='".$tlpsupp."', TGL_DATANG ='".$tgldtg."' WHERE  ID_SUPPLIER= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Supplier berhasil diubah'); window.location.href='Supplier.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Supplier gagal diubah'); window.location.href='Supplier.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: Supplier.php'); 
}