<?php
	session_start();
	require_once("config.php");
	require_once("sosialClass.php");
	echo '<script language="javascript">';
	//login DB
	$email = strip_tags($_POST['email']);
	$pass = md5(strip_tags($_POST['pass']));
	$data = chatClass::login($email,$pass);
	if (isset($data->username) && $user == $data->username){
	   $_SESSION['username'] = $data->username;
	}
	else{
			echo 'alert("Wrong User or Password"); ';
	}
	//	header("Location: chat.php?session=" . $_SESSION['session']);
	echo "location.href='$location'; ";
	echo '</script>';
?>
