<?php
//membangung koneksi
$username="dinda_920";
$password="dinda_920";
$database="LOCALHOST/XE";

$koneksi=oci_connect($username, $password, $database);

if(!$koneksi) {
$err=oci_error();
echo "gagal tersambung ke ORACLE". $err['text'];
} else {
	//echo "koneksi berhasil";
}
?>