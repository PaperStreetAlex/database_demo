<?php
include 'vendor/autoload.php'; 
$con = new Acme\Config\Database();

if(isset($_POST['username'])){

	$user = new Acme\Models\Users();
	$user->username = $_POST['username'];
	$user->password = $_POST['password'];
	$user->lastname = $_POST['lastname'];
	$user->firstname = $_POST['firstname'];
	$user->middlename = $_POST['middlename'];
	$user->save();
	header('Location:index.php');
	
}

?>
<html>
<head>
	<title>Sample</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function(){
    		$('.datatable').DataTable();
		});
	</script>
</head>
<body>
	<div style="max-width:700px;font-size:11px!important;margin:50px auto">
		<div class="well well-sm">
			<a href="index.php" class="btn btn-xs btn-default">View</a>  <a href="add.php" class="btn-xs btn btn-default">Add</a>
		</div>

<form method='POST' action=''>
	Username 
  	<input type='text' class='form-control' name='username' required>
  	<br>Password
  	<input type='password' class='form-control'  name='password' required>
  	<br>Lastname
  	<input type='text' class='form-control'  name='lastname' required>
  	<br>Firstname
  	<input type='text' class='form-control'  name='firstname' required>
  	<br>Middlename
  	<input type='text' class='form-control'  name='middlename' required>
  	<br>
  	<button class="btn btn-default">Submit</button>
</form>
</table>
</div>
</html>
