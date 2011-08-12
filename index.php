<?php
require('include/l10n/enUS.php');
require('include/vars.php');
require('include/templates.php');

/** 
 * Using a simplistic template system is not the best for larger sites, but it works well for smaller ones.
 * Personally, I prefer using something like XSLT for managing a multitude of pages.
 */
 
 // TODO: Add (more) client-side message length checks.
 // TODO: Add language selector.
 // TODO: Add a captcha to prevent massive spam/database overloading.

print_header();
?>

<form name="message" action="submit_message.php" method="post">
	<!-- You could spend 5+ hours trying to get CSS-based alignment to properly behave across multiple browsers *OR* you could use a table. I used a table. I'm so sorry, internets... please forgive me. -->
	<table>
		<tr>
			<td class="label-td"><label><?php echo($STRING_FIRST_NAME); ?></label></td>
			<td><input type="text" name="first-name" maxlength="<?php echo($MAX_NAME_LEN); ?>" /></td>
		</tr>
		<tr>
			<td class="label-td"><label><?php echo($STRING_LAST_NAME); ?></label></td>
			<td><input type="text" name="last-name" maxlength="<?php echo($MAX_NAME_LEN); ?>" /></td>
		</tr>
		<tr>
			<td class="label-td"><label><?php echo($STRING_MESSAGE); ?></label></td>
			<td><textarea name="message" rows="15"></textarea></td>
		</tr>
		<tr>
			<td /><td><input class="button" type="submit" value="<?php echo($STRING_SUBMIT); ?>" /></td>
		</tr>
	</table>
</form>

<?php print_footer(); ?>
