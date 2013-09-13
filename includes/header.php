<?php ob_start(); ?>
<?php 
session_start(); 
include ("includes/connection.php");
?>
<html>
	<head>
		<title>Anasayfa</title>
		<link href="css/blog.css" media="all" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script language="javascript">
		$(function(){
			$("#selectall").click(function() {
				  $('.case').attr('checked', this.checked);
			});
			$(".case").click(function(){
				if($(".case").length == $(".case:checked").length) {
					$("#selectall").attr("checked", "checked");
				} else{
					$("#selectall").removeAttr("checked");
				}
			});
		});
		</script>
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
				echo "Kullanýcý: "; echo $_SESSION["kullanici"]; 
			?>
				</div>
			<?php
			}
			?>
				

		</div>
<?php ob_end_flush(); ?>