<?php
	$connection =mysql_connect("localhost","------","------");
	if(!$connection){
		die("Veritaban�na Ba�lan�lamad�: ".mysql_error());
	}
	$db_select = mysql_select_db("-----",$connection);
	if(!$db_select){
		die("Veritaban� Tablo Se�im Hatas�: ".mysql_error());
	}
?>
