<?php
if($_SESSION["rol"] == 1){
	//i�erik sayfas� sayfalar tablosu
	$sayfa = mysql_query ("SELECT * FROM sayfalar",$connection);
	if(!$sayfa){
		die ("Veritaban� Sorgu Hatas�: ".mysql_error());
	}
	echo "<table border=1 width=100%>";
		echo "<tr>";
			echo "<td align=center>Id</td>";
			echo "<td>Kategori Ad�</td>"; 								
			echo "<td>��lem</td>";  
		echo "</tr>";
	while ($row3 = mysql_fetch_array($sayfa));{
		echo "<tr>";
			echo "<td>".$row3["kategori_id"]."</td>";
			echo "<td>".$row3["kategori_ad"]."</td>";
			echo "<td>D�zenle Sil</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>