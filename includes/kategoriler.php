<?php
							//içerik sayfasý kategori tablosu
							$kategori = mysql_query ("SELECT * FROM kategori",$connection);
							if(!$kategori){
								die("Veritabaný Sorgu Hatasý: ".mysql_error());
							}
							echo "<table border=1 width=100%>";
							echo "<tr>";
								echo "<td align=center>Id</td>";
								echo "<td>Kategori Adý</td>";   
								echo "<td>Ýþlem</td>";  
								echo "</tr>";
							while ($row2 = mysql_fetch_array($kategori)) {
								echo "<tr>";
								echo "<td>".$row2["kategori_id"]."</td>";
								echo "<td>".$row2["kategori_ad"]."</td>";  
								echo "<td>Düzenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";

?>