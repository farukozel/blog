<?php include ("includes/connection.php");?>

<?php
	session_start();
	ob_start();
	ob_end_flush();
	if(!isset($_SESSION["giris"])){
		echo "Bu sayfayý Görüntüleyemezsiniz..!";
		echo "<a href=index.php>Geri dön</a>";
	}else{
	$icerik = $_GET["a"];

?>
<?php include ("includes/header.php");?>
		<div id="orta">
			<div class="leftbar">
				<div class="menu">
				Menüler
				</div>
				<div class="icerik">
					<?php
					
						if($icerik == "kullanici"){
							//Ýçerik Sayfasý Kullanýcý Tablosu
							$kullanici = mysql_query ("SELECT * FROM kullanicilar",$connection);
							if(!$kullanici){
								die ("Veritabaný Sorgu Hatasý: ".mysql_error());
							}
							echo "<table border=1 width=100%>";
							echo "<tr>";
								echo "<td align=center>Id</td>";  
								echo "<td align=center>Rol</td>"; 
								echo "<td align=center>Kullanýcý Adý</td>";  
								echo "<td align=center>E-Posta</td>";  
								echo "<td>Ýþlem</td>";
								echo "</tr>";
							while ($row = mysql_fetch_array($kullanici)) {
								echo "<tr>";
								
								//Yönetici - yazar Kontrolü
								echo "<td>".$row["user_id"]."</td>";
								if($row["user_rol"]==1){
									echo "<td >Yönetici</td>";
								}else{
									echo "<td>Yazar</td>";
								}
								echo "<td>".$row["user_name"]."</td>";  
								echo "<td>".$row["user_mail"]."</td>";
								echo "<td>Düzenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";
//--------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "makale"){
							//Ýçerik Sayfasý Makale Tablosu
							$makale = mysql_query ("SELECT * FROM makale",$connection);
							if(!$makale){
								die ("Veritabaný Sorgu Hatasý: ".mysql_error());
							}
							echo "<table border=1 width=100%>";
							echo "<tr>";
								echo "<td align=center>Id</td>";
								echo "<td>Makale Adý</td>";  
								echo "<td>Tarih</td>"; 
								echo "<td>Yazar</td>";  
								echo "<td>Ýþlem</td>";  
								echo "</tr>";
							while ($row1 = mysql_fetch_array($makale)) {
								echo "<tr>";
								echo "<td>".$row1["makale_id"]."</td>";
								echo "<td>".$row1["makale_ad"]."</td>";  
								echo "<td>".$row1["tarih"]."</td>";
								echo "<td>".$row1["yazar"]."</td>";
								echo "<td>Düzenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";
//-------------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "kategori"){
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
//---------------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "sayfa"){
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
						}elseif($icerik == "makale_ekle"){
							/*<div width="50px" height="50px" color="blue"> vdfvfdvfbvfg</div>
							<div class=makaleekle>
								<form align="center" name="kullanici" action="giris.php"  method="post">
								<p>
									<input style="width:150px; font-size:22" type="text"  name="ad" value="Kullanýcý Adý" onclick="this.value='';" />
								</p>
								<p>
									<input style="width:150px; font-size:22" type="password" name="sifre" value="Parola" onclick="this.value='';" />
								</p>
								<p>
									<input type="submit" value="Giriþ" id="submit" />
								</p>
								</form>
							</div>*/
							echo "Daha bitirilmedi........!";
						 } 	
//---------------------------------------------------------------------------------------------------------------------------------------------------------?>
															
				</div>
			</div>
			<div class="rightbar">
				<div class="arama">
				Arama Yap
				</div>
				<div class="makale">Yönetim
					<ul>
						<?php 
							echo "<a href=\"admin.php?a=kullanici\">".Kullanýcýlar."</a><br>";
							echo "<a href=\"admin.php?a=makale\">".Makaleler."</a><br>";
							echo "<a href=\"admin.php?a=kategori\">".Kategoriler."</a><br>";
							echo "<a href=\"admin.php?a=sayfa\">".Sayfalar."</a><br>";
						?>
					</ul>
				</div>
				<div class="login">
				Makaleler 
					<ul>
						<?php
							echo "<a href=\"admin.php?a=makale_ekle\">"."Yeni Makale Ekle"."</a><br>";
						?>
					</ul>
				</div>
			</div>
		</div>
	
<?php include ("includes/footer.php");}?>