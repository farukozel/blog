<?php
session_start();
	//Kar��lama Ekran�
	echo "<center>Ho�geldiniz</center>";
		echo	$_SESSION["giris"];
		echo	$_SESSION["kullanici"];
		echo	$_SESSION["sifre"];
		echo	$_SESSION["mail"];
		echo	$_SESSION["rol"];
?>