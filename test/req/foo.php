<?php

class Req_foo
{
	function process_request($jdat)
	{
		$frm = file_get_contents('templates/formtest.html');
		return $frm;
	}
}
