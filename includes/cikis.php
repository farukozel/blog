<?php ob_start(); ?>
<?php
	session_start();
	session_destroy();
	header("Location:http://blog.farukozel.net/index.php");
?>
<?php ob_end_flush(); ?>