<?php
session_start();
	//Karþýlama Ekraný
	echo "<center>Hoþgeldiniz</center>";
		echo    "<br>";
		echo	"Merhaba: ";
		echo	$_SESSION["kullanici"];
		echo    "<br>";
		echo	"Þifre: ";
		echo	$_SESSION["sifre"];
		echo    "<br>";
		echo	"E-POSTA: ";
		echo	$_SESSION["mail"];
		echo    "<br>";
		echo	"Rol: ";
		echo	$_SESSION["rol"];
?>