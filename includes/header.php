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
			<div class = "logo"> Logo Alaný </div>
			<div class = "siteadi"> Site Adý/Slogan </div>
			
			<?php 
			if(isset($_SESSION["giris"])){ //eðer kullanýcý giriþ yapmamýþsa header bölmesinin saðýnda kullanýcý adýný yazmayacak.
			?>	
			<div class = "oturum">
			<?php
				echo "Kullanýcý adý: "; echo $_SESSION["kullanici"]; 
			?>
				</div>
			<?php
			}
			?>
				
				
		</div>