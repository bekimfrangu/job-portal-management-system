<?php include("config.php");?>
<footer id="footer">
						<section>
							<h2>Aliquam sed mauris</h2>
							<p>Sed lorem ipsum dolor sit amet et nullam consequat feugiat consequat magna adipiscing tempus etiam dolore veroeros. eget dapibus mauris. Cras aliquet, nisl ut viverra sollicitudin, ligula erat egestas velit, vitae tincidunt odio.</p>
							<ul class="actions">
								<li><a href="generic.html" class="button">Learn More</a></li>
							</ul>
						</section>
						
						<section>
						<dl class="alt">
						<?php
            $result = mysqli_query($conn, "CALL zgjedhTeDhenatInfoFund('Fundi_Info')");
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
					
            $result = mysqli_query($conn, "CALL zgjedhTeDhenatRrjetetSocialeFund('Fundi_RrjetetSociale')");
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
            $result = mysqli_query($conn, "CALL zgjedhTeDhenatEdrejtaAutorialeFund('Fundi_EdrejtaAutoriale')");
            while ($row = mysqli_fetch_assoc($result)) {

              extract($row);
			  
			  
if($result==null)
  mysqli_free_result($result);

?>
						
						<?php echo $Shpjegimi; ?>
						
				<?php } ?>
				
				</p>

</footer>