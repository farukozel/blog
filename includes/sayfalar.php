<?php
if($_SESSION["rol"] == 1){
	//içerik sayfasý sayfalar tablosu
	$sayfa = mysql_query ("SELECT * FROM sayfalar",$connection);
	if(!$sayfa){
		die ("Veritabaný Sorgu Hatasý: ".mysql_error());
	}
	echo "<table border=1 width=100%>";
		echo "<tr>";
			echo "<td align=center>Id</td>";
			echo "<td>Kategori Adý</td>"; 								
			echo "<td>Ýþlem</td>";  
		echo "</tr>";
	while ($row3 = mysql_fetch_array($sayfa));{
		echo "<tr>";
			echo "<td>".$row3["kategori_id"]."</td>";
			echo "<td>".$row3["kategori_ad"]."</td>";
			echo "<td>Düzenle Sil</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>