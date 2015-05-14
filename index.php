<?php
include 'src/config/start.php'; 
include 'src/models/User.php';
include 'src/views/head.php';

$user = Users::all();
foreach($user as $a){
	echo "<tr><td>".$a->id."<td>".$a->username."<td>".$a->lastname.", ".$a->firstname ." ". $a->middlename[0].". <td>option here";
} 


include 'src/views/foot.php';
?>
