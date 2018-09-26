<?php

ini_set('display_errors', 'Off');
ini_set('error_log', '/etc/openvpn/scripts/test.log');

include "db.php";
// Read username / password from environment variables
/*$username = "";
$password = "";

// Read username / password from tmp file
$file=fopen("$argv[1]", "r") or exit(1);
while(!feof($file)) {
  $line=rtrim(fgets($file));
  if     (empty($username) && empty($password)) { $username="$line"; }
  elseif (isset($username) && empty($password)) { $password="$line"; }
}
fclose($file);
*/

$config = include('config.php');

$db = new mysql();
$db->connect( $config['host'], $config['db'], $config['user'], $config['pass'] );

?>