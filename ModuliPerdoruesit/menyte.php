<?php include("config.php");?>
	<nav id="nav">
		<?php
								 $result = mysqli_query($conn_meny, "CALL zgjedhTeDhenatFund('Meny_Perdoruesi')");
					while ($row = mysqli_fetch_assoc($result)) {

					  extract($row);
					  
								  
					if($result==null)
					  mysqli_free_result($result);

					?>
					<?php echo $Shpjegimi ?>

		<?php } ?>
</nav>