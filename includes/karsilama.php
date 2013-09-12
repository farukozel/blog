<?php
session_start();
	//Karþýlama Ekraný
	echo "<center>Hoþgeldiniz</center>";
		echo	$_SESSION["giris"];
		echo	$_SESSION["kullanici"];
		echo	$_SESSION["sifre"];
		echo	$_SESSION["mail"];
		echo	$_SESSION["rol"];
?>