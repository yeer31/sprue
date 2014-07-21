<?php

class Req_home
{
	function process_request($jdat)
	{
		$frm = file_get_contents('templates/home.html');
		return $frm;
	}
}