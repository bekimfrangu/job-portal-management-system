<?php include("config.php");?>
<footer id="footer">
						<section>
									<?php
											$result = mysqli_query($conn_pershkrimi, "CALL zgjedhTeDhenatFund('Fundi_Pershkrim')");
											while ($row = mysqli_fetch_assoc($result)) {

											  extract($row);
											  
											  
								if($result==null)
								  mysqli_free_result($result);
	
									?>
										<h2><?php echo $Shenimi; ?></h2>
										<?php echo $Shpjegimi; ?>
									<?php } ?>
						</section>
						
						<section>
							<h2>Info</h2>
								<dl class="alt">
									<?php
											$result = mysqli_query($conn_fund, "CALL zgjedhTeDhenatFund('Fundi_Info')");
											while ($row = mysqli_fetch_assoc($result)) {

											  extract($row);
											  
											  
												if($result==null)
												  mysqli_free_result($result);
					
													?>
						
						
									<?php echo $Shpjegimi; ?>
								
									<?php } ?>
								</dl>
	
								<ul class="icons">		
										<?php
											$result = mysqli_query($conn_rrjetetSociale, "CALL zgjedhTeDhenatFund('Fundi_RrjetetSociale')");
											while ($row = mysqli_fetch_assoc($result)) {

											  extract($row);
											  
											  
												if($result==null)
												  mysqli_free_result($result);
					
													?>
						
						
									<?php echo $Shpjegimi; ?>
								
									<?php } ?>
								</ul>
						</section>
						<p class="copyright">
							
									<?php
											$result = mysqli_query($conn_edrejtaAutoriale, "CALL zgjedhTeDhenatFund('Fundi_EdrejtaAutoriale')");
											while ($row = mysqli_fetch_assoc($result)) {

											  extract($row);
											  
											  
								if($result==null)
								  mysqli_free_result($result);
	
									?>
						
						
						<?php echo $Shpjegimi; ?>
						
						
						<?php } ?>
						</p>
					</footer>