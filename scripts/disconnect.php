#!/usr/local/php55/bin/php55
<?php
include "init.php";

//error_log( json_encode( $_SERVER ) );


$fetch = $db->sql("SELECT id FROM user WHERE ip = ? AND status = '1' AND main = '0'")->find_one([ trim( getenv('ifconfig_pool_remote_ip') ) ]);

if( count( $fetch ) === 0 ) {
	error_log( getenv('common_name').' not exists' );

} else {
	$db->table("user")->where( "id", "=", $fetch['id'] )->update([
		'ip' => '',
	], ", online = online - 1");


	$fetch_last_log = $db->sql("SELECT id FROM log WHERE userid = ? ORDER BY id DESC ")->find_one([ $fetch['id'] ]);


	$db->table("log")->where("id", "=", $fetch_last_log['id'])->update([
		'recieve' => getenv('bytes_received'),
		'send' => getenv('bytes_sent'),
		'end' => time(),
	]);

}



?>