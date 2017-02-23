<?php
  require_once("config.php");
  require_once("sosialClass.php");
  $place = isset($_POST['place']) ? $_POST['place'] : null;
  $street = isset($_POST['street']) ? $_POST['street'] : null;
  $number = isset($_POST['number']) ? $_POST['number'] : null;
	$jsonData = sosialClass::getSearchOf($place,$street,$number);
  print $jsonData;
?>
