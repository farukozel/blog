<?php include ("includes/connection.php");?>

<?php
	session_start();
	ob_start();
	ob_end_flush();
	if(!isset($_SESSION["giris"])){
		echo "Bu sayfay� G�r�nt�leyemezsiniz..!";
		echo "<a href=index.php>Geri d�n</a>";
	}else{
	$icerik = $_GET["a"];

?>
<?php include ("includes/header.php");?>
		<div id="orta">
			<div class="leftbar">
				<div class="menu">
				Men�ler
				</div>
				<div class="icerik">
					<?php
					
						if($icerik == "kullanici"){
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
								echo "<td>��lem</td>";
								echo "</tr>";
							while ($row = mysql_fetch_array($kullanici)) {
								echo "<tr>";
								
								//Y�netici - yazar Kontrol�
								echo "<td>".$row["user_id"]."</td>";
								if($row["user_rol"]==1){
									echo "<td >Y�netici</td>";
								}else{
									echo "<td>Yazar</td>";
								}
								echo "<td>".$row["user_name"]."</td>";  
								echo "<td>".$row["user_mail"]."</td>";
								echo "<td>D�zenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";
//--------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "makale"){
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
//-------------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "kategori"){
							//i�erik sayfas� kategori tablosu
							$kategori = mysql_query ("SELECT * FROM kategori",$connection);
							if(!$kategori){
								die("Veritaban� Sorgu Hatas�: ".mysql_error());
							}
							echo "<table border=1 width=100%>";
							echo "<tr>";
								echo "<td align=center>Id</td>";
								echo "<td>Kategori Ad�</td>";   
								echo "<td>��lem</td>";  
								echo "</tr>";
							while ($row2 = mysql_fetch_array($kategori)) {
								echo "<tr>";
								echo "<td>".$row2["kategori_id"]."</td>";
								echo "<td>".$row2["kategori_ad"]."</td>";  
								echo "<td>D�zenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";
//---------------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "sayfa"){
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
						}elseif($icerik == "makale_ekle"){
							/*<div width="50px" height="50px" color="blue"> vdfvfdvfbvfg</div>
							<div class=makaleekle>
								<form align="center" name="kullanici" action="giris.php"  method="post">
								<p>
									<input style="width:150px; font-size:22" type="text"  name="ad" value="Kullan�c� Ad�" onclick="this.value='';" />
								</p>
								<p>
									<input style="width:150px; font-size:22" type="password" name="sifre" value="Parola" onclick="this.value='';" />
								</p>
								<p>
									<input type="submit" value="Giri�" id="submit" />
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
				<div class="makale">Y�netim
					<ul>
						<?php 
							echo "<a href=\"admin.php?a=kullanici\">".Kullan�c�lar."</a><br>";
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