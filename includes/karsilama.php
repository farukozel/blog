<?php
session_start();
	//Kar��lama Ekran�
	echo "<center>Ho�geldiniz</center>";
		echo    "<br>";
		echo	"Merhaba: ";
		echo	$_SESSION["kullanici"];
		echo    "<br>";
		echo	"�ifre: ";
		echo	$_SESSION["sifre"];
		echo    "<br>";
		echo	"E-POSTA: ";
		echo	$_SESSION["mail"];
		echo    "<br>";
		echo	"Rol: ";
		echo	$_SESSION["rol"];
?>