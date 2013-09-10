<?php
	$gelen_yazar = $_SESSION["kullanici"];
	$makale_ad = $_POST["makale_ad"];
	$kategori_sec =$_POST["kategori_sec"];
	$makale_icerik = $_POST["makale_icerik"];
	if (($makale_ad == "") or ($kategori_sec == "") or ($makale_icerik == "")){ //kullanýcý adý, Þifre ve rol alanlarý boþ girilirse hata mesajý yayýnlar
		echo '<script type="text/javascript">alert("Boþ býraktýðýnýz alanlar var!");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=http://blog.farukozel.net/admin.php?a=makale_ekle">';
	}else{
		$makale_sonuc = mysql_query("INSERT INTO makale(makale_ad,makale_icerik,yazar) VALUES ('$makale_ad','$makale_icerik','$gelen_yazar')",$connection);
		if(isset($makale_sonuc)){
			header("Location:http://blog.farukozel.net/admin.php?a=makale");
		}else{
			echo "Bir Hata Oluþtu : ".mysql_error();
		}
	}
?>