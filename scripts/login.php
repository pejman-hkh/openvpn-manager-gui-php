#!/usr/local/php55/bin/php55
<?php

$username = '';
$password = '';

$file=fopen("$argv[1]", "r") or exit(1);
while(!feof($file)) {
  $line=rtrim(fgets($file));
  //error_log( 'line is'.$line );
  if     (empty($username) && empty($password)) { $username="$line"; }
  elseif (isset($username) && empty($password)) { $password="$line"; }
}
fclose($file);

include "init.php";

//error_log( $username );

$fetch = $db->sql("SELECT id FROM user WHERE username = ? AND password=? AND status = '1' AND main = '0' AND expire > ? AND online < concurrent ")->find_one([ $username, md5($password), time() ]);



if( count($fetch) > 0 ) {

	$db->table("log")->insert([
		'userid' => $fetch['id'],

	]);
	/*$db->table("user")->where("id", "=", $fetch['id'] )->update([
		'online' => '1',
	]);*/
}
//error_log( json_encode( $fetch ) );

//echo $fetch['result']."\n";
exit( count($fetch)>0?0:1 );

?>