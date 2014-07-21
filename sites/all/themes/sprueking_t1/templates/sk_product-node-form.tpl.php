
<hr>
<b>SPRUEKING</b>
<hr>
<?php
krumo($form);
$flds = array('title','body','field_sk_sector','field_sk_manufacturer_id','field_sk_price','field_sk_price_date','field_sk_dir_category','field_sk_dir_sub_category','field_sp_taxo');
foreach($flds as $fld)
	print drupal_render_children($form[$fld]);
?>
<hr>