<?php 
require_once('./config/database.php');
if( isset( $_GET['id'] ) ){
	$current_id = $_GET['id'];
}


if( isset( $_POST['update_info'] ) ){
	$fname = $_POST['update_fname'];		
	$lname = $_POST['update_lname'];		
	$email = $_POST['update_email'];
		
	mysqli_query($con, "UPDATE users SET user_fname='$fname', user_lname='$lname', user_email='$email' WHERE id='$current_id' ");   
	header("Location: users.php");
}
