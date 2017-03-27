<?php
	session_start();
	require_once("config.php");
	require_once("sosialClass.php");
	echo '<script language="javascript">';
	$location = "admin.php";
	if (isset($_POST['submit']) && isset($_SESSION['username'])){
		//new house DB
		$houseName = strip_tags($_POST['name']);
		$description = strip_tags($_POST['description']);
		$place = strip_tags($_POST['place']);
		$street = strip_tags($_POST['description']);
		$number = strip_tags($_POST['number']);
		$owner = "Sin dueño asignado";
		$renter = "";
		$rooms = strip_tags($_POST['rooms']);
		$bathrooms = strip_tags($_POST['bathrooms']);
		$squaremeters = strip_tags($_POST['squaremeters']);
		$floor = strip_tags($_POST['floor']);
		$orientation = strip_tags($_POST['orientation']);
		$type = strip_tags($_POST['type']);

		$rented = 0;
		if(isset($_POST['rented']) &&	$_POST['rented'] == 'rented') {
			$rented = 1;
		}
		//upload img
		$ds= DIRECTORY_SEPARATOR;  //1
 		$storeFolder = 'houseimages';   //2
		$houseFolder = substr(strtolower(preg_replace('/[0-9_\/]+/','',base64_encode(sha1(substr( md5(rand()), 0, 7))))),0,10); //random name
		$max_file_size = 1024*2000; //2000 kb
		foreach ($_FILES['files']['name'] as $f => $name) {
			if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }
			if ($_FILES['files']['size'][$f] > $max_file_size) {
	        $message[] = "$name is too large!.";
	    		continue; // Skip large files
	    }
			$finfo = new finfo(FILEINFO_MIME_TYPE);
			$tempFile = $_FILES['files']['tmp_name'][$f];          //3

    	if (false === $ext = array_search(
        $finfo->file($tempFile),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
        ),
        true
    	)) {
        continue;
    	}
      $targetPath = dirname( __FILE__ ) . $ds. $storeFolder. $ds . $houseFolder . $ds;  //4
			if (!file_exists($targetPath)) {
				mkdir($targetPath); // crea el directorio
			}
      $targetFile =  $targetPath. substr(strtolower(preg_replace('/[0-9_\/]+/','',base64_encode(sha1($tempFile)))),0,10) . "." . $ext;  //5
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
		echo "alert('$houseName'); ";
		$data = sosialClass::setNewHouse( $houseName,$description,$place,$street,$number,$owner,$renter,$houseFolder,$rented);
	}
	echo "location.href='$location'; ";
	echo '</script>';
?>
