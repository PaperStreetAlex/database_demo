<?php
include 'src/config/start.php'; 
include 'src/models/User.php';

if(isset($_GET['id'])){
	$user = Users::find($_GET['id']);
	$user->delete();
	header('Location:index.php');
}else if(isset($_POST['x'])){
	$user = Users::find($_POST['x']);
	echo "Username : <input type='text' id='username'  class='form-control' value ='".$user['attributes']['username']."'>";
	echo "<br> Lastname : <input type='text' id='lastname' class='form-control' value ='".$user['attributes']['lastname']."'>";
	echo "<br> Firstname : <input type='text' id='firstname' class='form-control' value ='".$user['attributes']['firstname']."'>";
	echo "<br> Middlename : <input type='text' id='middlename' class='form-control' value ='".$user['attributes']['middlename']."'>";
}else if(isset($_POST['y'])){
	$user = Users::find($_POST['y']);
	$user->username = $_POST['a'];
	$user->lastname = $_POST['b'];
	$user->firstname = $_POST['c'];
	$user->middlename = $_POST['d'];
	$user->save();
}