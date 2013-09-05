<?php include ("includes/connection.php");
session_start();
	$giris = mysql_query ("SELECT * FROM kullanicilar",$connection);
	if(!$giris){
		die ("Veritabaný Sorgu Hatasý: ".mysql_error());
	}
	$giriskullanici = mysql_fetch_array($giris);
	if(($_POST["ad"] == $giriskullanici["user_name"]) and ($_POST["sifre"] == $giriskullanici["user_pass"])){
		$_SESSION["giris"] = "true";
		$_SESSION["kullanici"] = $kullanici;
		$_SESSION["sifre"] = $sifre;
		header("Location:admin.php");
	}else{
		echo "kullanýcý adý ve þifre yanlýþ <br>";
		echo "<a href=index.php> Geri Dön </a>";
		header("Location:index.php");
	}
?>