<?php 
session_start();
include ("connection.php");
	$gelen_kullanici=$_POST["ad"];
	$gelen_sifre = $_POST["sifre"];
	
	$giris = mysql_query ("SELECT * FROM kullanicilar",$connection);
	if(!$giris){
		die ("Veritaban� Sorgu Hatas�: ".mysql_error());
	}
	
	$giriskullanici = mysql_fetch_array($giris);
	if(($gelen_kullanici == $giriskullanici["user_name"]) and ($gelen_sifre == $giriskullanici["user_pass"])){
		$_SESSION["giris"] = "true";
		$_SESSION["kullanici"] = $kullanici;
		$_SESSION["sifre"] = $sifre;
		header("Location:http://blog.farukozel.net/admin.php");
	}else{
		echo "kullan�c� ad� ve �ifre yanl�� <br>";
		echo "<a href=index.php> Geri D�n </a>";
		
	}
?>