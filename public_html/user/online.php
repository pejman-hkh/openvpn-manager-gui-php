<?
include("../../header.php");

?>

<h2>Online user from openvpn manager</h2>
	
<?
function get_online_users() {

  $fp = fsockopen("localhost", 6666, $errno, $errstr, 30);

  if (!$fp) {
    return [];

  } else {
      fwrite($fp, "status\n");
  
      $data = [];
      $do_get = false;
      while (!feof($fp)) {
          $get = fgets($fp, 128);
    
        if( preg_match('#ROUTING TABLE#', $get ) )
          break;

          if( $do_get )
          $data[] = $get; //trim( explode( ",", $get )[0] );

          if( preg_match('#Common Name#i', $get ))
            $do_get = true;

      }


      fclose($fp);
  }

  return $data;
}

$loop = get_online_users();
?>

  <div class="alert alert-warning">
    This page show live status of users
  </div>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Username</th>
        <th>Ip</th>
        <th>Sent</th>
        <th>Receive</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>

		<?

    foreach($loop as $k => $v ) {
      $exp = explode(",", $v );
      ?>
      <tr class="<?=$class[$v['online']]?>">
        <td><?=$exp[0]?></td>
        <td><?=$exp[1]?></td>
        <td><?=$exp[2]?></td>
        <td><?=$exp[3]?></td>
        <td><?=$exp[4]?></td>

      </tr>

		<? } ?>
    </tbody>
  </table>


<?
include("../../footer.php");
?>