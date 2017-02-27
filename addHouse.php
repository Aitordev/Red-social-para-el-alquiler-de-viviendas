<?php
	session_start();
	require_once("config.php");
	require_once("sosialClass.php");
	echo '<script language="javascript">';
	$location = "admin.php";
	//new house DB
	$name = strip_tags($_POST['name']);
	$description = strip_tags($_POST['description']);
	$place = strip_tags($_POST['place']);
	$street = strip_tags($_POST['description']);
	$number = strip_tags($_POST['number']);
	$owner = "";
	$renter = "";
	if (!isset($_SESSION['username'])){
		echo 'alert("Not logged"); ';
	}
	else{
		//upload img
		$ds= DIRECTORY_SEPARATOR;  //1
 		$storeFolder = 'houseimages';   //2
 		if (!empty($_FILES)) {
    	$tempFile = $_FILES['file']['tmp_name'];          //3
      $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
      $targetFile =  $targetPath. $_FILES['file']['name'];  //5
     	move_uploaded_file($tempFile,$targetFile); //6
    }
		//upload img fin
		if (isset($_POST['user'])) {
			if ($_POST['user'] == 0){
				$owner = $_SESSION['username'];
			}
			else{
				$renter = $_SESSION['username'];
			}
		}
		$data = sosialClass::setNewHouse( $name,$description,$place,$street,$number,$owner,$renter);
	}
	echo "location.href='$location'; ";
	echo '</script>';
?>
