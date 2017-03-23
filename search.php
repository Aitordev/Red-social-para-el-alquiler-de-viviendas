<?php
  session_start();
  require_once("config.php");
  require_once("sosialClass.php");
  $user = isset($_SESSION[ 'username' ]) ? $_SESSION[ 'username' ]: "";
  $place = isset($_POST['place']) ? $_POST['place'] : null;
  $street = isset($_POST['street']) ? $_POST['street'] : null;
  $number = isset($_POST['number']) ? $_POST['number'] : null;
	$jsonData = sosialClass::getSearchOf($place,$street,$number,$user);
  print $jsonData;
?>
