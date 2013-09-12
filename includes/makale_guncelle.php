<?php ob_start(); ?>
<?php
	$guncel_makale_ad = $_POST["makale_ad"];
	$guncel_kategori_sec =$_POST["kategori_sec"];
	$guncel_makale_icerik = $_POST["makale_icerik"];
	
		$makale_guncelle = mysql_query("UPDATE makale SET makale_ad='$guncel_makale_ad', makale_icerik='$guncel_makale_icerik' WHERE makale_id='$id' ",$connection);
		if(isset($makale_guncelle)){
			header("Location:http://blog.farukozel.net/admin.php?a=makale");
		}else{
			echo "Bir Hata Oluþtu : ".mysql_error();
		}

?>
<?php ob_end_flush(); ?>