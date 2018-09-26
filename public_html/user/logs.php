<?
include("../../header.php");

?>


		<h2>Log list </h2>
	
		<?
		$loop = $db->sql("SELECT * FROM log WHERE userid = ? ORDER BY id DESC ")
    ->pagination( $_GET, 10 )
    ->find( [ $_GET['id'] ] );

    $pagination = $db->get_pagination();

		?>

  <?=show_pagination( $pagination )?>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Detail</th>
        <th>Detail</th>
        <th>Start</th>
        <th>End</th>
        <th>Send</th>
        <th>Recive</th>
  
      </tr>
    </thead>
    <tbody>

		<?foreach($loop as $k => $v ) {?>
      <tr>
        <td><?=$v['ip']?>:<?=$v['port']?></td>
        <td><?=$v['remote_ip']?>:<?=$v['remote_port']?></td>

        <td><?=(  ! empty($v['start']) ? date("Y/m/d H:i", $v['start'] ) : "" )?></td>
        <td><?=( ! empty( $v['end'] ) ? date("Y/m/d H:i", $v['end']) : "" )?></td>
        <td><?=$v['send']?></td>
        <td><?=$v['recieve']?></td>
      </tr> 

		<? } ?>
    </tbody>
  </table>

  <?=show_pagination( $pagination )?>



<?
include("../../footer.php");
?>