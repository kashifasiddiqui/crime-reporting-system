<?php 

$current = basename($_SERVER['SCRIPT_NAME']);

?>

<div id="navcontainer">
	<ul id="navlist">
	<li <?php if($current == 'index.php') echo 'class="active"'?>><a href="index.php">HOME</a><span></li>
		<li <?php if($current == 'report.php') echo 'class="active"'?>><a href="report.php">REPORT CRIME</a><span></li>		
		<li <?php if($current == 'alerts.php') echo 'class="active"'?>><a href="alerts.php">ALERTS</a><span> </li>	
		<li <?php if($current == 'login1.php') echo 'class="active"'?>><a href="login1.php">HELPING HAND</a><span></li>
		<li <?php if($current == 'publichero.php') echo 'class="active"'?>><a href="publichero.php">PUBLIC HERO</a><span></li>
        <li <?php if($current == 'frunt.php') echo 'class="active"'?>><a href="frunt.php">FORUMS</a><span></li>

		
		<li style="float:right;<?php if(!isset($_SESSION['email'])) echo 'display:none;';?>" > <a href="logout.php"><small>		<img src="assets/images/unlock_white.png" width="20px" height="20px" style="position: relative; top: -1px;"> <b><?php echo $_SESSION['email']; ?></b>		</small></a></li>
	</ul>
</div>