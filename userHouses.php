<?php
  session_start();
  if (!isset($_SESSION[ 'username' ]) || $_SESSION[ 'username' ] === null  || $_SESSION[ 'username' ] === ""){
	   header("Location: index.php");
  }
  else{
	   require_once("config.php");
     require_once("sosialClass.php");
     $user = isset($_POST['username']) ? $_POST['username'] : $_SESSION[ 'username' ];
	   $jsonData = sosialClass::getUserHouses($user);
     print $jsonData;
  }
?>
