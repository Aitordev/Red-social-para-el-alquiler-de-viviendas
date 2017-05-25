<?php
  session_start();
  if (!isset($_SESSION[ 'username' ]) || $_SESSION[ 'username' ] === null  || $_SESSION[ 'username' ] === ""){
	   header("Location: index.php");
  }
  else{
	   require_once("config.php");
     require_once("sosialClass.php");
     $id = $_POST['id'];
	   $jsonData = sosialClass::removeHouse($id);
     print $jsonData;
  }
?>
