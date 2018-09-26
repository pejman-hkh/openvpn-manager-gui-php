<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

	<script>
	(function($) {
	    $.fn.valRadio = function(val) {
	        return this.each(function() {
	            if ($(this).is(":radio") && $(this).attr("value") == val) $(this).attr("checked", !0)
	        })
	    }
	})(jQuery);

	</script>
</head>
<body>
	<div class="container">

<?

include 'bootstrap.php';

if( ! $user = check_login() ) {
	header('Location: '.site_url.'login.php');
	exit();
}

?>
<br />


<div class="row">
	<div class="col-md-3">

		<div class="card card-default">
		  <div class="card-body">
				<h5><b><?=$user['name']?></b> welcome</h5>
				<a href="<?=site_url?>logout.php">Logout</a>

		  </div>
		</div>
		<br />


		<ul class="list-group">
		  <li class="list-group-item"><a href="<?=site_url?>index.php">Dashboard</a></li>
		  <li class="list-group-item"><a href="<?=site_url?>user/add.php">Add user</a></li>
		  <li class="list-group-item"><a href="<?=site_url?>user/list.php">User list</a></li>
		  <li class="list-group-item"><a href="<?=site_url?>user/list.php?online=1">Online user</a></li>
		  <li class="list-group-item"><a href="<?=site_url?>user/online.php">Online user from manager</a></li>
		  
		</ul>		
	</div>

	<div class="col-md-9">