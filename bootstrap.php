<?php
session_start();

include("lib/db.php");

$db = new mysql();

$config = require('config/db.php');

$db->connect( $config['host'], $config['db'], $config['user'], $config['pass'] );

function flash( $msg, $status = 0 ) {
	$arr = [
		1 => 'success',
		0 => 'danger'
	];
	echo '<div class="alert alert-'.$arr[ $status ].'">'.$msg.'</div>';
}

define( 'site_url', '/ovpn/');

function check_login() {
	global $db;

	if( $_SESSION['agent'] !== md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']) ) {
		return false;
	}

	$fetch = $db->sql("SELECT * FROM user WHERE id = ? AND main = '1' ")->find_one([ $_SESSION['id'] ]);

	if( count( $fetch ) > 0  ) {
		return $fetch;
	}

	return false;
}

function qs( $qs, $no = '' ) {
	
	if( substr( $qs, 0, 1) === '?' ) {
		$qs = substr( $qs, 1);
	}

	$exp = explode( "&", $qs );

	$ret = '';
	$pre = '';
	foreach( $exp as $k => $v ) {
		$ep = explode( "=", $v );
		$key = $ep[0];
		$value = @$ep[1];

		if( $key === $no ) {
			continue;
		}

		$ret .= $pre.$v;

		$pre = '&';
	}

	return $ret;
}

//echo qs("?page=10", "page");


function show_pagination( $pagination ) {

	$e_ruri = explode("?", $_SERVER['REQUEST_URI'] );

	$qs = qs( @$e_ruri[1], 'page');

	$link = $e_ruri[0].($qs !== "" ? '?' : '' ).@$qs.($qs !== "" ? '&' : '?').'page=';
?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="<?=$link?><?=$pagination['prev']?>">Previous</a></li>
    <?foreach( $pagination['loop'] as $k => $v ) {
    	$class = '';
    	if( @$_GET['page'] == $v || ( ! isset( $_GET['page'] ) && $v == 1 ) ) {
    		$class = 'active';
    	}
    	?>
      <li class="page-item <?=$class?>"><a class="page-link" href="<?=$link?><?=$v?>"><?=$v?></a></li>
    <? } ?>
    <li class="page-item"><a class="page-link" href="<?=$link?><?=$pagination['next']?>">Next</a></li>
  </ul>
</nav>



<?	
}


?>