<?php

class Form_foo
{
	function process_formdata($jdat)
	{
		$xdb = new xdb();
		$xdb->connect('localhost','root','','sprueking');
		$f = 'id="'.$jdat->data->id.'",';
		$f .= 'print_dimensions="'.$jdat->data->prdim.'",';
		$f .= 'print_volume="'.$jdat->data->prvol.'"';
		
		//$out = $xdb->insert('pr3d_pr3d',$f) ;
		//$out = 'CHECK: '.$f;
		//return $out;	
		if( $xdb->insert('pr3d_pr3d',$f) )
			$out = 'Foo Handled this:<br>';
		else
			$out = 'FAILED: '.$f;	
//		$dum = $xdb->select('node','title','nid=9');
//		$out .= '{{'.$dum[0]['title'].'}}';
//		$out .= $fld.' with '.$dat.'<br>';
		return $out;
	}
}