<?
include("../../header.php");

?>

		<?
		function action() {
			global $db;

			if( empty( $_POST['password'] ) ) {
				return flash('Password required');
			}

			if( $_POST['password'] !== $_POST['confirm_password'] ) {
				return flash('Confirm your password');
			}

				
			$db->table("user")->where( "id", "=", $_GET['id'] )->update([
				'password' => md5($_POST['password']),
			]);

			return flash("Edited", 1 );			
		}
		
		if( count( $_POST ) > 0 ) {
	
			action();
		}
		?>

		<?
		$fetch = $db->sql("SELECT id, username, name FROM user WHERE id = ? ")->find_one([ $_GET['id'] ]);
		?>

		<h2>Edit user <?=$fetch['name']?></h2>
		<form method="post" action="" id="form">
		  <div class="form-group">
		    <label>Password </label>
		    <input type="text" name="password" class="form-control">
		  
		  </div> 

 		
 		  <div class="form-group">
		    <label>Confirm Password </label>
		    <input type="text" name="confirm_password" class="form-control">
		  
		  </div> 


		  <button type="submit" class="btn btn-primary">Save</button>
		</form>

		<script type="text/javascript">
			$('#expire').datepicker();
		</script>	
	
	

<?
include("../../footer.php");
?>