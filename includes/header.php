<?php 
session_start(); 
include ("includes/connection.php");
?>
<html>
	<head>
		<title>Anasayfa</title>
		<link href="css/blog.css" media="all" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="header">
			<div class = "logo"> Logo Alan� </div>
			<div class = "siteadi"> Site Ad�/Slogan </div>
			
			<?php 
			if(isset($_SESSION["giris"])){ //e�er kullan�c� giri� yapmam��sa header b�lmesinin sa��nda kullan�c� ad�n� yazmayacak.
			?>	
			<div class = "oturum">
			<?php
				echo "Kullan�c� ad�: "; echo $_SESSION["kullanici"]; 
			?>
				</div>
			<?php
			}
			?>
				
				
		</div>