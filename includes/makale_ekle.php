<?php
	$gelen_yazar = $_SESSION["kullanici"];
	$makale_ad = $_POST["makale_ad"];
	$kategori_sec =$_POST["kategori_sec"];
	$makale_icerik = $_POST["makale_icerik"];
	if (($makale_ad == "") or ($kategori_sec == "") or ($makale_icerik == "")){ //kullan�c� ad�, �ifre ve rol alanlar� bo� girilirse hata mesaj� yay�nlar
		echo '<script type="text/javascript">alert("Bo� b�rakt���n�z alanlar var!");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=http://blog.farukozel.net/admin.php?a=makale_ekle">';
	}else{
		$makale_sonuc = mysql_query("INSERT INTO makale(makale_ad,makale_icerik,yazar) VALUES ('$makale_ad','$makale_icerik','$gelen_yazar')",$connection);
		if(isset($makale_sonuc)){
			header("Location:http://blog.farukozel.net/admin.php?a=makale");
		}else{
			echo "Bir Hata Olu�tu : ".mysql_error();
		}
	}
?>