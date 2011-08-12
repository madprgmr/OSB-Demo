<?php
require('include/l10n/enUS.php');
require('include/vars.php');
require('include/templates.php');

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$message = $_POST['message'];

$success = false;

if(!is_valid_name($first_name)) {
	$display_message = sprintf($STRING_SUBMIT_MESSAGE_FAILURE, $STRING_FIRST_NAME);
} else if(!is_valid_name($last_name)) {
	$display_message = sprintf($STRING_SUBMIT_MESSAGE_FAILURE, $STRING_LAST_NAME);
} else if(!is_valid_message($message)) {
	$display_message = sprintf($STRING_SUBMIT_MESSAGE_FAILURE, $STRING_MESSAGE);
} else {
	require_once('include/db.php');
	
	if(!submit_message($first_name, $last_name, $message)) {
		$display_message = $STRING_DATABASE_ERROR . '<br /><br />' . mysql_error();
	} else {
		$display_message = sprintf($STRING_SUBMIT_MESSAGE_SUCCESS, $first_name, $last_name);
	
		$success = true;
	}
}

function is_valid_name($name) {
	global $MAX_NAME_LEN;

	$len_name = strlen($name);
	return $len_name <= $MAX_NAME_LEN && $len_name > 0;
}

function is_valid_message($message) {
	global $MAX_MESSAGE_LEN;
	
	$len_message = strlen($message);
	return $len_message <= $MAX_MESSAGE_LEN && $len_message > 0;
}

print_header();
?>

<div id="message">
	<?php echo($display_message); ?>
</div>


<?php print_footer(); ?>