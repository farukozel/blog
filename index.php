<?php
include ("includes/giris.php");
include ("includes/header.php");
 ?>
		<div id="orta">
			<div class="leftbar">
				<div class="menu">
				Men�ler
				</div>
				<div class="icerik"> ��erik
				</div>
			</div>
			<div class="rightbar">
				<div class="arama">
				Arama
				</div>
				<div class="sagorta">
				<div class="baslik"> Ar�iv </div>
				</div>
				<div class="sagalt">	
					 <div class="baslik"> Oturum A� </div>
					 <div class="login" >
						<form align="center" action="index.php"  method="POST">
						<p>
							<input type="text"  name="ad" value="Kullan�c� Ad�" onclick="this.value='';" />
						</p>
						<p>
							<input type="password" name="sifre" value="Parola" onclick="this.value='';" />
						</p>
						<p>
							<input type="submit" value="Giri�" id="submit" />
						</p>
						</form> 
					</div>		
				</div>	
			</div>
		</div>
<?php include ("includes/footer.php");?>