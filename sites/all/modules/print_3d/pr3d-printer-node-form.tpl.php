This is a special Dave Form for entering/editing data...<br>
<p>
<?php 
	$form['#limit_validation_errors'] = array();
	$form['#element_validate'] 				= array();
	unset($form['#needs_validation']);
	echo drupal_render_children($form);
?>
</p>