<?PHP 
# memanggil fail connection
include ("connection.php");
	
#arahan SQL untuk menyimpan data	
$arahan_sql_kemaskini = "DELETE FROM tb_login WHERE id_login = '".$_GET['delete_id']."'";
	
#melaksanakan proses menyimpan data dalam syarat if
	if(mysqli_query($condb,$arahan_sql_kemaskini))
	{
		#jika proses menyimpan berjaya,papar info dan buka laman add.php
		//echo "<script>alert('Data Berjaya Dipadam')</script>";
		redirect("senarai_pengguna.php?success=3");
	}
	else
	{	
		#jika proses menyimpan gagal,papar laman sebelumnya
		echo"<script>alert('Gagal Padam');
		window.history.back();</script>";
	}
?>
