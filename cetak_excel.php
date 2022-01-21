<!DOCTYPE html>
<?php
include 'koneksi.php';
include'fungsi/fungsi_rupiah.php';

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=LaporanDataPenjualan.xls");
?>
<html>

<head>
	<title>CETAK Data</title>
</head>
<body>
<h3><center>Laporan Data Penjualan  </h3>
			 <br>
			  
			  <br><br>
          <div class="col-lg-12">
              <div class="card mb-4">
               
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                      <tr>
						      <th>NO</th>
						      <th>ID_TRANSAKSI</th>
						      <th>ID_KASIR</th>
                  			  <th>ID_KUSTOMER</th>
						      <th>NAMA_TRANSAKSI</th>
						      <th>TANGGAL_TRANSAKSI</th>
                 			  <th>JUMLAH_BARANG</th>
                  			 <th>HARGA_TRANSAKSI</th>
                  			 <th>TOTAL_PEMBAYARAN</th>   						
                      </tr>
                    </thead>
                    
                    <tbody>
					<?php 
					include'koneksi.php';
					$no = 1;
					$total_semua = 0;
					$stid = oci_parse($koneksi,'SELECT Kasir.*, Kustomer.*, Transaksi.* FROM Transaksi Transaksi INNER JOIN Kasir Kasir ON Transaksi.ID_KASIR= Kasir.ID_KASIR INNER JOIN Kustomer Kustomer ON Transaksi.ID_KUSTOMER = Kustomer.ID_KUSTOMER ORDER BY Transaksi.ID_TRANSAKSI ASC');    
					oci_execute($stid);

					while (($row = oci_fetch_array ($stid, OCI_BOTH)) != false) {
					$total = $row["HARGA_TRANSAKSI"] * $row["TOTAL_PEMBAYARAN"];
					$total_semua += $total;	
						
						?>
                      <tr>
                        <td>
						 <?php echo $no; ?>
						</td>
           				<td>
            			 <?php echo $row["ID_TRANSAKSI"];?>
           				</td>
						<td>
						 <?php echo $row["ID_KASIR"];?>
						</td>
						<td>
						 <?php echo $row["ID_KUSTOMER"]?>
						</td>
						<td>
            			 <?php echo $row["NAMA_TRANSAKSI"]?>
           			    </td>						
						<td> 
						 <?php echo $row["TGL_TRANSAKSI"]?>
						</td>
						<td>
						 <?php echo $row["JMLH_BRG"]?>
						</td>
            			<td>
            			 <?php echo $row["HARGA_TRANSAKSI"]?>
           			    </td>
           				<td>
             			 <?php echo $row["TOTAL_PEMBAYARAN"] ?>
            			</td>
                     </tr>                                         
                    </tbody>
					 <?php
						$no++;
						}
						
					?>
                  </table>
                </div>
              </div>
            </div>
			
			
          </div>
          
		  <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <!-- Popover basic -->
              <div class="card mb-4">
               
                <div class="card-body">
                 
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Dismiss on next click -->
              <div class="card mb-4">
                
                <div class="card-body">
                 <center>Bekasi, 16 Januari 2022 </center>
							<b><center>Manager Perusahaan</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b><center>Dinda Puspita Dewi</center></b>
                </div>
              </div>
            </div>
	
 

 
</body>
</html>