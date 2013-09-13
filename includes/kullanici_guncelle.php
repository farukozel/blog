<?php ob_start(); ?>
<?php
if($_SESSION["rol"] == 1){
	$guncel_kullanici_ad = $_POST["kullanici_ad"];
	$guncel_eposta =$_POST["eposta"];
	$guncel_sifre = $_POST["sifre"];
	$guncel_rol = $_POST["rol"];

		$kullanici_guncelle = mysql_query("UPDATE kullanicilar SET user_name='$guncel_kullanici_ad', user_mail='$guncel_eposta', user_pass='$guncel_sifre', user_rol='$guncel_rol' WHERE user_id='$id' ",$connection);
		if(isset($kullanici_guncelle)){
			header("Location:http://blog.farukozel.net/admin.php?a=kullanici");
		}else{
			echo "Bir Hata Oluştu : ".mysql_error();
		}
}
?>
<?php ob_end_flush(); ?>