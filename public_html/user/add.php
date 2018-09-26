<?
include("../../header.php");

?>

		<h2>Add user </h2>
	
		<?
		function action() {
			global $db;

			if( empty( $_POST['username'] ) || empty( $_POST['password'] ) || empty( $_POST['name'] ) ) {
				return flash('Username & Password & Name required');
			}

			$fetch = $db->sql("SELECT id FROM user WHERE username = ? ")->find_one([ $_POST['username'] ]);
			if( count( $fetch ) > 0 ) {
				return flash("This username used before");
			}
				
			$inser = $db->table("user")->insert([
				'concurrent' => $_POST['concurrent'],
				'status' => $_POST['status'],
				'username' => $_POST['username'],
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'mobile' => $_POST['mobile'],
				'date' => time(),
				'expire' => strtotime($_POST['expire']),
				'password' => md5($_POST['password']),
			]);

			return flash("Added", 1 );			
		}

		if( count( $_POST ) > 0 ) {
	
			action();
		}
		?>
		<?include "form.php" ?>
		<script type="text/javascript">
			$('#expire').datepicker();
		</script>

<?
include("../../footer.php");
?>