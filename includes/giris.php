<?php ob_start(); ?>
<?php
	session_start();
	include ("includes/connection.php");
	if($_POST){ // Form D��mesine t�klan�nca alttaki i�lemleri yapan sorgu.
		$gelen_kullanici=$_POST["ad"];
		$gelen_sifre = $_POST["sifre"];
		if (($gelen_kullanici == "") or ($gelen_sifre == "")){ //kullan�c� ad� ve �ifre bo� girilirse hata mesaj� yay�nlar
			echo '<script type="text/javascript">alert("Bo� b�rakt���n�z alanlar var!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=http://blog.farukozel.net/index.php">';
		}else{
			$giris = mysql_query ("SELECT * FROM kullanicilar WHERE user_name = '$gelen_kullanici' and user_pass = '$gelen_sifre' and user_rol",$connection);
			if(mysql_num_rows($giris)==1){
				$_SESSION["giris"] = "true";
				$_SESSION["kullanici"] = $gelen_kullanici;
				$_SESSION["sifre"] = $gelen_sifre;
				echo '<script type="text/javascript">alert("Ba�ar�yla giri� yapt�n�z! Y�nlendirileceksiniz...");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=http://blog.farukozel.net/admin.php?a=hosgeldiniz">';
			}else{
				echo '<script type="text/javascript">alert("Kullan�c� ad� veya �ifreniz yanl��!");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=index.php">';
			}
		}
	}
?>
<?php ob_end_flush(); ?>