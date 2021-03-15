<?php
/**
 * 
 * @package Login With Sngine
 * @author pvspike
 * @download https://github.com/pvspike/Login-With-Sngine
 */

require_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav-right {
  float: right;
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="https://endgame.ro">Contact</a>
  <div class="topnav-right">
	<?php
	if(!isset($_SESSION['userData'])){
		echo '<a href="'.$SNGINE_URL.'/api/oauth?app_id='.$SNGINE_APP_ID.'">Login with '.$SNGINE_NAME.'</a>';	
	}
	else
	{
		echo '<a href="logout.php">Logout</a>';		
	}
	?>
  </div>
</div>

<div style="padding-left:16px">
  <h2>Sngine Login</h2>
  <p>Just demo</p>
</div>

<?php
	echo 'Hello '.$_SESSION['userData']['f_name'].' '.$_SESSION['userData']['l_name'].' you are logged in ! ';
?>

					
</body>
</html>					