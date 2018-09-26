<?
include("../../header.php");

?>

		<?
		function action() {
			global $db;

			if( empty( $_POST['username'] ) || empty( $_POST['name'] ) ) {
				return flash('Username & Password & Name required');
			}

			$fetch = $db->sql("SELECT id FROM user WHERE username = ? AND id != ? ")->find_one([ $_POST['username'], $_GET['id'] ]);
			if( count( $fetch ) > 0 ) {
				return flash("This username used before");
			}
				
			
			$db->table("user")->where( "id", "=", $_GET['id'] )->update([
				'concurrent' => $_POST['concurrent'],
				'status' => $_POST['status'],
				'username' => $_POST['username'],
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'mobile' => $_POST['mobile'],
				'expire' => strtotime($_POST['expire']),
				
			]);

			return flash("Edited", 1 );			
		}
		
		if( count( $_POST ) > 0 ) {
	
			action();
		}
		?>

		<?
		$fetch = $db->sql("SELECT id, status, username, name, email, mobile, DATE_FORMAT(FROM_UNIXTIME(expire), '%Y/%m/%d') as expire FROM user WHERE id = ? ")->find_one([ $_GET['id'] ]);
		?>

		<h2>Edit user <?=$fetch['username']?></h2>
	
	
		<?include "form.php" ?>
	
		<script>
			var data_edit = <?=json_encode($fetch)?:'{}';?>;

		   for(x in data_edit) {
		        if( typeof data_edit[x] == 'undefined' || data_edit[x] == null ) continue;
		        val = data_edit[x];

		        $("#form [name='"+x+"']").not(":radio").val( val );

		        try {
		            $("#form [name='"+x+"[]']:checkbox").val( val.split(',') );
		        } catch( e ) {

		        }
		        
		        $("#form [name='"+x+"']:radio").valRadio( val );
		    }

		</script>

<?
include("../../footer.php");
?>