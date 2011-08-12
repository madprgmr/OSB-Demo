<?php
$server = 'localhost';
$username = 'root';
$password = '';

$link = mysql_connect($server, $username, $password);
$IS_DATABASE_ACTIVE = ($link != false);

function submit_message($first_name, $last_name, $message) {
	$result = mysql_select_db('forms');

	if($result) {
		$query = sprintf('INSERT INTO forms (first_name, last_name, message) VALUES (\'%s\',\'%s\',\'%s\')', mysql_real_escape_string($first_name), mysql_real_escape_string($last_name), mysql_real_escape_string($message));
		$result = mysql_query($query);
	}
	
	return $result;
}

?>