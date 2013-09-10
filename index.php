<?php
include ("includes/giris.php");
include ("includes/header.php");
 ?>
		<div id="orta">
			<div class="leftbar">
				<div class="menu">
				Menüler
				</div>
				<div class="icerik"> Ýçerik
				</div>
			</div>
			<div class="rightbar">
				<div class="arama">
				Arama
				</div>
				<div class="sagorta">
				<div class="baslik"> Arþiv </div>
				</div>
				<div class="sagalt">	
					 <div class="baslik"> Oturum Aç </div>
					 <div class="login" >
						<form align="center" action="index.php"  method="POST">
						<p>
							<input type="text"  name="ad" value="Kullanýcý Adý" onclick="this.value='';" />
						</p>
						<p>
							<input type="password" name="sifre" value="Parola" onclick="this.value='';" />
						</p>
						<p>
							<input type="submit" value="Giriþ" id="submit" />
						</p>
						</form> 
					</div>		
				</div>	
			</div>
		</div>
<?php include ("includes/footer.php");?>