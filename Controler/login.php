<?php 

session_start();
require_once '../Classes/User.php';
$user = new User();

if(isset($_POST['email'])){
	
	$email = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');

	$user -> Login($email, $password);
	
}