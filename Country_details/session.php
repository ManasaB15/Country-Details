<?php
	include("dbconfig.php");
	session_start();
	$email_check = $_SESSION['email'];
	//print_r($email_check);
	$sql = mysqli_query($conn, "SELECT email FROM user WHERE email='$email_check'");
	$row = mysqli_fetch_assoc($sql);
	$login_session =$row['email'];
	if(!isset($_SESSION['email'])){	
	      header("location:index.php");
	}
?>
