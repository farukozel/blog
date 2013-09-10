<?php
	$guncel_kullanici_ad = $_POST["kullanici_ad"];
	$guncel_eposta =$_POST["eposta"];
	$guncel_sifre = $_POST["sifre"];
	$guncel_rol = $_POST["rol"];

		$kullanici_guncelle = mysql_query("UPDATE kullanicilar SET user_name='$guncel_kullanici_ad', user_mail='$guncel_eposta', user_pass='$guncel_sifre', user_rol='$guncel_rol' WHERE user_id='$id' ",$connection);

?>