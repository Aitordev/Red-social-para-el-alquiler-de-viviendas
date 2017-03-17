<?php
  require_once("config.php");
  require_once("sosialClass.php");
  $user = isset($_POST['user']) ? $_POST['user'] : null;
	$jsonData = sosialClass::getUserHouses($user);
  print $jsonData;
?>
