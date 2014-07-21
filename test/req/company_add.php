<?php

class Req_company_add
{
	function process_request($jdat)
	{
		$frm = file_get_contents('templates/add_company.html');
		return $frm;
	}
}
