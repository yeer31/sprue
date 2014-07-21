<?php

class Req_product_list
{
	function process_request($jdat)
	{
		$frm = file_get_contents('templates/product_list.html');
		return $frm;
	}
}