<?php
require_once("conn_login.php");
include("header.php");

/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/

if(isset($_SESSION['userData']) != ""){
	
if(isset($_GET['success']) && $_GET['success']=="1") {
	echo "<script>
			setTimeout(function() {
                Swal.fire({
                    position: '', showConfirmButton: false, titleText: 'Simpanan Berjaya !', text: 'Permohonan anda telah berjaya dihantar !', icon: 'success', timerProgressBar: true, timer: 3000
                })
			}, 600);
		</script>";
}
if(isset($_GET['success']) && $_GET['success']=="2") {
	echo "<script>
            setTimeout(function() {
                Swal.fire({
                    position: 'top-end', showConfirmButton: false, titleText: 'Kemaskini Berjaya !', text: 'Data anda telah berjaya dikemaskini !', icon: 'success', timerProgressBar: true, timer: 3000
                })
            }, 600);
		</script>";
}
if(isset($_GET['success']) && $_GET['success']=="3") {
	echo "<script>
            setTimeout(function() {
                Swal.fire({
                    position: 'top-end', showConfirmButton: false, titleText: 'Padam Berjaya !', text: 'Data anda telah berjaya dipadam !', icon: 'success', timerProgressBar: true, timer: 3000
                })
            }, 600);
		</script>";
}
?>

	<?php
	# arahan sql untuk memilih homestay yang masih kosong pada tarikh dipilih
	$arahan_SQL_cari = "SELECT * FROM tb_homestay";

	# melaksanakan arahan memilih
	$laksana_arahan_cari = mysqli_query($condb,$arahan_SQL_cari);
	if(mysqli_rows($laksana_arahan_cari)) {
		# pembolehubah rekod mengambil data yang di pilih baris demi baris
		$i = 0;
		while ($rekod = mysqli_fetch_array($laksana_arahan_cari))
		{
			$i++;
			echo "
			<div class='col-lg-3 col-md-6 mb-4'>
				<div class='card h-100'>
				<img class='card-img-top' style='max-height:230px;' src='".$rekod['hs_image']."' alt=''>
					<div class='card-body'>
						<h4 class='card-title'>".$rekod['hs_name']."</h4>
						<p class='card-text'>".$rekod['hs_address']."</p>
						<p class='card-text'>RM ".$rekod['hs_price']."</p>
					</div>
					<div class='card-footer'>
						<a href='tempahan.php?id=".$rekod['id_homestay']."' class='btn btn-primary'>Tempah Sekarang !</a>
					</div>
				</div>
			</div>
			";
		}
	} else {
		echo "Tiada Data Ditemukan";
	}
	?>

<?php
} else {
	header("Location: pelanggan_login.php");
	exit(); // Quit the script.
	include("footer.php");
}
include ("footer.php");
?>
