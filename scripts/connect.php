#!/usr/local/php55/bin/php55
<?php
include "init.php";


$fetch = $db->sql("SELECT id FROM user WHERE username = ? AND status = '1' AND main = '0'")->find_one([ trim( getenv('common_name') ) ]);


$db->table("user")->where( "id", "=", $fetch['id'] )->update([
	'ip' => getenv('ifconfig_pool_remote_ip'),
], ", online = online + 1");


$fetch_last_log = $db->sql("SELECT id FROM log WHERE userid = ? ORDER BY id DESC ")->find_one([ $fetch['id'] ]);


$db->table("log")->where("id", "=", $fetch_last_log['id'])->update([
	'ip' => getenv('trusted_ip'),
	'remote_ip' => getenv('ifconfig_pool_remote_ip'),
	'port' => getenv('trusted_port'),
	'remote_port' => getenv('remote_port_1'),
	'recieve' => getenv('bytes_received'),
	'send' => getenv('bytes_sent'),
	//'date' => time(),
	'start' => time(),
	'end' => 0,
]);