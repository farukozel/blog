<?php include ("includes/connection.php");?>
<?php include ("includes/header.php");?>
<?php
	$sayfa = $_GET["a"];

	if(isset($_GET["kullanici"])){
		$gelen_kullanici = $_GET["kullanici"];
		$gelen_makale = "";
		$gelen_kategori = "";
		$gelen_sayfa = "";
	}elseif(isset($_GET["makale"])){
		$gelen_kullanici = "";
		$gelen_makale = $_GET["makale"];
		$gelen_kategori = "";
		$gelen_sayfa = "";
	}elseif(isset($_GET["kategori"])){
		$gelen_kullanici = "";
		$gelen_makale = "";
		$gelen_kategori = $_GET["kategori"];
		$gelen_sayfa = "";
	}elseif(isset($_GET["sayfa"])){
		$gelen_kullanici = "";
		$gelen_makale = "";
		$gelen_kategori = "";
		$gelen_sayfa = $_GET["sayfa"];
	}else{
		$gelen_kullanici = "";
		$gelen_makale = "";
		$gelen_kategori = "";
		$gelen_sayfa = "";
	}
?>
		<div id="orta">
			<div class="leftbar">
				<div class="menu">
				Men�ler
				</div>
				<div class="icerik">
				��erik<br>
					<?php
					
						if($sayfa == "kullanici"){
							//��erik Sayfas� Kullan�c� Tablosu
							$kullanici = mysql_query ("SELECT * FROM kullanicilar",$connection);
							if(!$kullanici){
								die ("Veritaban� Sorgu Hatas�: ".mysql_error());
							}
							echo "<table border=1 width=100%>";
							echo "<tr>";
								echo "<td align=center>Id</td>";  
								echo "<td align=center>Rol</td>"; 
								echo "<td align=center>Kullan�c� Ad�</td>";  
								echo "<td align=center>E-Posta</td>";  
								echo "</tr>";
							while ($row = mysql_fetch_array($kullanici)) {
								echo "<tr>";
								
								//Y�netici yada yazar Kontrol�
								echo "<td>".$row["user_id"]."</td>";
								if($row["user_rol"]==1){
									echo "<td >Y�netici</td>";
								}else{
									echo "<td>Yazar</td>";
								}
								echo "<td>".$row["user_name"]."</td>";  
								echo "<td>".$row["user_mail"]."</td>";
								echo "</tr>";
							}
							echo "</table>";
//--------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($sayfa == "makale"){
							//��erik Sayfas� Makale Tablosu
							$makale = mysql_query ("SELECT * FROM makale",$connection);
							if(!$makale){
								die ("Veritaban� Sorgu Hatas�: ".mysql_error());
							}
							echo "<table border=1 width=100%>";
							echo "<tr>";
								echo "<td align=center>Id</td>";
								echo "<td>Makale Ad�</td>";  
								echo "<td>Tarih</td>"; 
								echo "<td>Yazar</td>";  
								echo "<td>��lem</td>";  
								echo "</tr>";
							while ($row1 = mysql_fetch_array($makale)) {
								echo "<tr>";
								echo "<td>".$row1["makale_id"]."</td>";
								echo "<td>".$row1["makale_ad"]."</td>";  
								echo "<td>".$row1["tarih"]."</td>";
								echo "<td>".$row1["yazar"]."</td>";
								echo "<td>D�zenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";
						}
//---------------------------------------------------------------------------------------------------------------------------------------------------------
						
						//echo 	$gelen_kullanici;
						echo	$gelen_makale;
						echo	$gelen_kategori;
						echo	$gelen_sayfa;
					?>
				</div>
			</div>
			<div class="rightbar">
				<div class="arama">
				Arama Yap
				</div>
				<div class="makale">Y�netim
					<ul>
						<?php 
							echo "<a href=\"admin.php?a=kullanici\">".Kullan�c�lar."</a><br>";
							echo "<a href=\"admin.php?a=makale\">".Makaleler."</a><br>";
							/*$kategori = mysql_query ("SELECT * FROM kategori",$connection);
							if(!$kategori){
								die ("Veritaban� Sorgu Hatas�: ".mysql_error());
							}
							$row2 = mysql_fetch_array($kategori);*/
							echo "<a href=\"admin.php?a=kategori\">".Kategoriler."</a><br>";
							
							/*$sayfa = mysql_query ("SELECT * FROM sayfalar",$connection);
							if(!$sayfa){
								die ("Veritaban� Sorgu Hatas�: ".mysql_error());
							}
							$row3 = mysql_fetch_array($sayfa);*/
							echo "<a href=\"admin.php?a=sayfa\">".Sayfalar."</a><br>";
						?>
					</ul>
				</div>
				<div class="login">
				Makaleler 
				</div>
			</div>
		</div>
<?php include ("includes/footer.php");?>