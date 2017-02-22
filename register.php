<?php
	session_start();
	require_once("config.php");
	require_once("sosialClass.php");
	echo '<script language="javascript">';
  $location = "index.php";
	//login DB
	$email = strip_tags($_POST['email']);
	$nick = strip_tags($_POST['nick']);
	$name = strip_tags($_POST['name']);
	$pass = md5(strip_tags($_POST['pass']));
	$pass2 = md5(strip_tags($_POST['pass2']));
	$data = sosialClass::register($email,$nick,$name,$pass,$pass2);
	if (isset($data->ok) && 1 == $data->ok){
	   $_SESSION['username'] = $nick;
	}
	elseif (isset($data->ok) && 2 == $data->ok){
			echo 'alert("Nick aldready used"); ';
	}
	else {
			echo 'alert("Email aldready used"); ';
	}
	//	header("Location: chat.php?session=" . $_SESSION['session']);
	echo "location.href='$location'; ";
	echo '</script>';
?>
