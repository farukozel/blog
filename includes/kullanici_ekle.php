<?php ob_start(); ?>
<?php
	$kullanici_ad = $_POST["kullanici_ad"];
	$eposta =$_POST["eposta"];
	$sifre = $_POST["sifre"];
	$rol = $_POST["rol"];
	if (($kullanici_ad == "") or ($sifre == "") or ($rol == "")){ //kullanýcý adý, Þifre ve rol alanlarý boþ girilirse hata mesajý yayýnlar
		echo '<script type="text/javascript">alert("Boþ býraktýðýnýz alanlar var!");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=http://blog.farukozel.net/admin.php?a=kullanici_ekle">';
	}else{
		$kullanici_sonuc = mysql_query("INSERT INTO kullanicilar(user_name,user_mail,user_pass,user_rol) VALUES ('$kullanici_ad','$eposta','$sifre','$rol')",$connection);
		if(isset($kullanici_sonuc)){
			header("Location:http://blog.farukozel.net/admin.php?a=kullanici");
		}else{
			echo "Bir Hata Oluþtu : ".mysql_error();
		}
	}
?>
<?php ob_end_flush(); ?>