<?php 
	require "vendor/autoload.php";
	$con = new Acme\Config\Database();
?>

<html>
<head>
	<title>Sample</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function(){
    		$('.datatable').DataTable();
		});
	</script>
	<script>
		function delete_item(x){
			if(confirm('Are you sure?')){
				window.location.href='delete.php?id='+x;
			}
		}
		function edit_item(x){
			$.ajax({
				url : "delete.php",
				type : "POST",
				data : {x:x},
				success: function(data){$(".modal-body").html(data); $('.modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" onclick="save_item('+x+')" class="btn btn-primary">Save changes</button>'); }
			});
		}
		function save_item(y){
			var a = $("#username").val(),b = $("#lastname").val(), c = $("#firstname").val(), d = $("#middlename").val();
			if(a.length == 0 || b.length == 0 || c.length == 0 || d.length == 0){
				alert("Somethings missing");
			}else{
				$.ajax({
					url : "delete.php",
					type : "POST",
					data : {y:y,a:a,b:b,c:c,d:d},
					success: function(data){ alert('successfully edited'); window.location.reload(); }
				});
			}
		}
	</script>
</head>
<body>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
      </div>
      <div class="modal-body" style="font-size:11px">
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
	<div style="max-width:700px;font-size:11px!important;margin:50px auto">
		<div class="well well-sm">
			<a href="index.php" class="btn btn-xs btn-default">View</a>  <a href="add.php" class="btn-xs btn btn-default">Add</a>
		</div>
		<table class="datatable table table-condensed table-striped" style="font-size:11px">
			<thead>
				<tr>
					<th>ID<th>Username<th>Name<th>Options
				</thead>

<?php
$user =  Acme\Models\Users::all();
foreach($user as $a){
	echo "<tr><td>".$a->id."<td>".$a->username."<td>".$a->lastname.", ".$a->firstname ." ". $a->middlename[0].". <td><a href='javascript:void(0)' data-toggle='modal' data-target='#myModal' onclick='edit_item(".$a->id.")' class='btn btn-xs btn-default'>Edit</a> <a href='javascript:void(0)' onclick='delete_item(".$a->id.")' class='btn btn-xs btn-default'>Delete</a>";
} 
?>
</table>
</div>
</html>
