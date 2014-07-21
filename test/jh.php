<?php

/*
	This tool will provide the functionality to handle requests and provide data back to a caller via JSON
*/

// Incoming request in JSON format is in the 'json' parameter
$json = $_REQUEST['json'];
$output = '';

if( !empty($json) && isset($json))
{
	include_once('xdb.php');
	
	$dec = json_decode($json);
	// check if we are getting a request to do something...
	if(isset($dec->req) && !empty($dec->req))
	{
		include('req/'.$dec->req.'.php');
		$cname = 'Req_'.$dec->req;
		if(class_exists($cname))
		{
			$reqclass = new $cname;
			if($reqclass)
			{
				$output = $reqclass->process_request($dec);
			}
		}
	}
	// check if we are getting form data...
	if(isset($dec->form) && !empty($dec->form))
	{
		include('form/'.$dec->form.'.php');
		$cname = 'Form_'.$dec->form;
		if(class_exists($cname))
		{
			$formclass = new $cname;
			if($formclass)
			{
				$output = $formclass->process_formdata($dec);
			}
		}
	}
	// else unknown!!!
}
print $output;
