<?php
	$connection =mysql_connect("localhost","fozel_blog","Fo98@*11");
	if(!$connection){
		die("Veritaban�na Ba�lan�lamad�: ".mysql_error());
	}
	$db_select = mysql_select_db("fozel_blog",$connection);
	if(!$db_select){
		die("Veritaban� Tablo Se�im Hatas�: ".mysql_error());
	}
?>