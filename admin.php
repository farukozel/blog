<?php
	session_start();
	if(!isset($_SESSION["giris"])){
		header("Location:http://blog.farukozel.net/index.php");
	}
?>
<?php include ("includes/connection.php");?>
<?php $icerik = $_GET["a"];?>
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
//-------------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "makale_ekle"){
							//Makale Ekleme Sayfas�n�n Olu�turulmas�
							?> 	<div class="makale_eklesol">  
										<div class="makaleadi"> Makale Ad� </div>
										<div class="makaleadi"> Kategori </div>
										<div class="makaleadi"> ��erik </div>
									</div>
									<div class="makale_eklesag">
											<form action="includes/makale_ekle.php" id="usrform" method="POST">
												<input class="makaleform1" type="text"  name="makale_ad" value=" Makale Ad�n� Giriniz..."  onclick="this.value='';" >
														<?php
													echo"<select name=kategori_sec class=option>";
													echo"<option value=Se�iniz.. selected> Se�iniz..</option>";
														$kategori = mysql_query ("SELECT * FROM kategori",$connection);
														if(!$kategori){
															die("Veritaban� Sorgu Hatas�: ".mysql_error());
														}
														while ($row2 = mysql_fetch_array($kategori)) {
															echo "<option value=\"".$row2["kategori_ad"]."\">".$row2["kategori_ad"]."</option>";
														}
								echo"					</select>";
								echo"			</input>";
								echo"		</form>";
								echo"		<textarea class=textarea name=makale_icerik onclick=this.value='' form=usrform> Makale ��eri�ini Giriniz...</textarea>";
								echo"		<input class=makale_buton type=submit form=usrform value=Kaydet />";
																				
								echo "</div>";
								
						} elseif($icerik == "hosgeldiniz"){
							//Kar��lama Ekran�
							echo "<h1>Ho�geldiniz</h1>";
						}	
//---------------------------------------------------------------------------------------------------------------------------------------------------------
					?>										
				</div>
			</div>
			<div class="rightbar">
				<div class="arama">
				Arama Yap
				</div>
				<div class="sagorta">
					<div class="baslik">Y�netim</div>
					<ul>
						<?php 
							echo "<li>";
							echo "<a href=\"admin.php?a=kullanici\">"."<h3>".Kullan�c�lar."</h3>"."</a>";
							echo "</li>";
							echo "<li>";
							echo "<a href=\"admin.php?a=makale\">"."<h3>".Makaleler."</h3>"."</a>";
							echo "</li>";
							echo "<li>";
							echo "<a href=\"admin.php?a=kategori\">"."<h3>".Kategoriler."</h3>"."</a>";
							echo "</li>";
							echo "<li>";
							echo "<a href=\"admin.php?a=sayfa\">"."<h3>".Sayfalar."</h3>"."</a>";
							echo "</li>";
							echo "<li>";
							echo "<a href=\"admin.php?a=ayar\">"."<h3>".Ayarlar."</h3>"."</a>";
							echo "</li>";
							echo "<li>";
							echo "<a href=\"admin.php?a=cikis\">"."<h3>". ��k��."</h3>"."</a>";
							echo "</li>";
						?>
					</ul>
				</div>
				<div class="sagalt">
				<div class="baslik"> Makaleler </div>
					<ul>
						<?php
							echo "<li>";
							echo "<a href=\"admin.php?a=makale_ekle\">"."<h3>Yeni Makale Ekle</h3>"."</a><br>";
							echo "</li>";
							echo "<li>";
							echo "<a href=\"admin.php?a=kullanici_ekle\">"."<h3>Yeni Kullan�c� Ekle</h3>"."</a><br>";
							echo "</li>";
						?>
					</ul>
				</div>
			</div>
		</div>
	
<?php include ("includes/footer.php");?>