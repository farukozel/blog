<?php include ("includes/connection.php");
session_start();
	$giris = mysql_query ("SELECT * FROM kullanicilar",$connection);
	if(!$giris){
		die ("Veritaban� Sorgu Hatas�: ".mysql_error());
	}
	$giriskullanici = mysql_fetch_array($giris);
	if(($_POST["ad"] == $giriskullanici["user_name"]) and ($_POST["sifre"] == $giriskullanici["user_pass"])){
		$_SESSION["giris"] = "true";
		$_SESSION["kullanici"] = $kullanici;
		$_SESSION["sifre"] = $sifre;
		header("Location:admin.php");
	}else{
		echo "kullan�c� ad� ve �ifre yanl�� <br>";
		echo "<a href=index.php> Geri D�n </a>";
		header("Location:index.php");
	}
?>