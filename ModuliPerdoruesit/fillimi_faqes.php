<?php include("config.php");?>
		<?php
            $result = mysqli_query($conn_fillim, "CALL zgjedhTeDhenatFund('Fillimi')");
            while ($row = mysqli_fetch_assoc($result)) {

              extract($row);
			  
			  
if($result==null)
  mysqli_free_result($result);

?>


			<header id="header" class="alt">
				<span class="logo"><img src="<?php echo $Fajlli;?>" alt="" /></span>
				<h1><?php echo $Shenimi ?></h1>
				<p><?php echo $Shpjegimi ?></p>
			</header>
			
			<?php } ?>