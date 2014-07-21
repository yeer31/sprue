<?php

class Form_product_list
{
	function process_formdata($jdat)
	{
		$out = 'Product list Handled this:<br>';
		foreach($jdat->data as $fld=>$dat)
			$out .= $fld.' with '.$dat.'<br>';
		return $out;
	}
}