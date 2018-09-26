<?
include("../../header.php");

?>


		<h2>User list </h2>
	
		<?
	$loop = $db->sql("SELECT id, online, ip, username, expire, name, email, mobile, date FROM user ")
    ->search( [ 'username', 'mobile', 'email', 'name' ], @$_GET['search'] )
    ->searchByKey([
      [ 'online' => [ 'online', '=' ] ],
    ], $_GET )
    ->pagination( $_GET, 10 )
    ->orderBy("id", "DESC")
    ->find();

    $pagination = $db->get_pagination();

    if( isset( $_GET['disconnect'] ) ) {
    	$db->sql("UPDATE user SET online = '0' WHERE id = ? ")->exec( [ $_GET['disconnect'] ] );
    	?>
    	<div class="alert alert-success">Disconnected</div>
    	<?
    }

    if( isset( $_GET['delete'] ) ) {
    	$db->sql("DELETE FROM user WHERE id = ? ")->exec( [ $_GET['delete'] ] );
    	$db->sql("DELETE FROM log WHERE userid = ? ")->exec( [ $_GET['delete'] ] );
    	?>
    	<div class="alert alert-success">Deleted</div>
    	<?
    }

?>

  <a href="?online=1">Online user</a>

  <form class="form-inline">
  <input type="text" class="form-control" name="search" />&nbsp;<input type="submit" value="Search" class="btn btn-primary form-control" />
  </form>
  <br />
  <?=show_pagination( $pagination )?>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Online</th>
        <th>Username</th>
        <th>Info</th>
        <th>Date</th>
        <th>Expire</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>

		<?
    $online = ['' => 'Offline', 0 => 'Offline', 1 => 'Online' ];
    $class = ['' => '', 0 => '', 1 => 'table-success' ];

    foreach($loop as $k => $v ) {?>
      <tr class="<?=$class[$v['online']]?>">
        <td><?=$v['name']?></td>
        <td><?=$v['ip']?><br /><?=$online[$v['online']]?></td>
        <td><?=$v['username']?></td>
        <td><?=$v['mobile']?><br /><?=$v['email']?></td>
        <td><?=date("Y/m/d", $v['date'] )?></td>
        <td><?=date("Y/m/d", $v['expire'] )?></td>
      
        <td><a href="<?=site_url?>user/edit.php?id=<?=$v['id']?>">Edit</a> / <a href="<?=site_url?>user/password.php?id=<?=$v['id']?>">Password</a> / <a href="<?=site_url?>user/logs.php?id=<?=$v['id']?>">Logs</a> / <a href="<?=site_url?>user/list.php?disconnect=<?=$v['id']?>">Disconnect</a> / <a href="<?=site_url?>user/list.php?delete=<?=$v['id']?>">Delete</a></td>
     
      </tr>

		<? } ?>
    </tbody>
  </table>

  <?=show_pagination( $pagination )?>



<?
include("../../footer.php");
?>