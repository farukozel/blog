<?php include ("includes/connection.php");?>
<?php include ("includes/header.php");?>
		<div id="orta">
			<div class="leftbar">
				<div class="menu">
				Men�ler
				</div>
				<div class="icerik">
					<table border="5" height="100%" width="100%" align="center">
					
						<tr>
							<td> 
								
							</td>
							
							<td> 
							
							</td>
						</tr>
						<tr>
							<td> </td>
							<td> </td>
						</tr>
					</table>
				</div>
			</div>
			<div class="rightbar">
				<div class="arama">
				Arama
				</div>
				<div class="makale">
				Ar�iv
				</div>
				<div class="login">	
					<table border="5" height="100%" width="100%" id="form" align="center">
						<tr>
							<td> 
								<h2 align="center" >Oturum A�</h2>
							</td>
						</tr>
						<tr>
							<td>
								<form align="center" action="includes/giris.php"  method="POST">
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
							</td>
						</tr>
					</table>
				</div>	
			</div>
		</div>
<?php include ("includes/footer.php");?>