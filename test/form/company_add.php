<?php

class Form_company_add
{
	function process_formdata($jdat)
	{
		$xdb = new xdb();
		$xdb->connect('localhost','root','','sprueking');
		
		$today = date('U');
		$bundle = 'sk_company';
		$d = $jdat->data;
		// Write to: node
		$tbl = 'node';
		$node_fields = array('type'=>$bundle,'language'=>'und','title'=>$d->co_name,'uid'=>'1','status'=>'1','created'=>$today);
		$f = $xdb->arr2flds($node_fields);
		$node_id = $xdb->insert($tbl,$f,'nid');
		//return $node_id;
		//exit;
		if($node_id)
		{
			// get nid
			// Write to: field_data_body
			$tbl = 'field_data_body';
			$fdb_fields = array('entity_type'=>'node','entity_id'=>$node_id,'revision_id'=>$node_id,'bundle'=>$bundle,'body_value'=>$d->co_descr,'body_format'=>'filtered_html');
			$f = $xdb->arr2flds($fdb_fields);
			$ins = $xdb->insert($tbl,$f);
			//return $ins;
			//exit;
			if( $ins)
			{
				// get id
	//			$tble = 'pr3d_pr3d';
	//			$xx_fields = array('email'=>'co_email','name'=>'co_name',''=>'co_login',''=>'co_addr1',''=>'co_addr2',''=>'co_city',''=>'co_state',''=>'co_country',''=>'co_postal',''=>'co_website',''=>'co_facebook');
				
				$xdb->write_field_info($node_id, $bundle, 'sk_street_address', $d->co_addr1, false);
				$xdb->write_field_info($node_id, $bundle, 'sk_city', $d->co_city, false);
				$xdb->write_field_info($node_id, $bundle, 'sk_province', $d->co_state, false);
				$xdb->write_field_info($node_id, $bundle, 'sk_country', $d->co_country, false, 'sk_country_iso2');
				$xdb->write_field_info($node_id, $bundle, 'sk_postalcode', $d->co_postal, false);
	
				//$xdb->write_field_info($node_id, $bundle, 'sk_sale_type', $d->co_, false);
				//$xdb->write_field_info($node_id, $bundle, 'sk_sector', $d->co_, false);
				//$xdb->write_field_info($node_id, $bundle, 'sk_telephone', $d->co_, false);
				//$xdb->write_field_info($node_id, $bundle, '', $d->co_, false);
				
				/*
				$f = 'id="'.$jdat->data->co_name.'",';
				$f .= 'print_dimensions="'.$jdat->data->co_email.'",';
				$f .= 'print_volume="'.$jdat->data->prvol.'"';
				
				if( $xdb->insert($tble,$f) )
					$out = 'Foo Handled this:<br>';
				else
					$out = 'FAILED: '.$f;	
				*/
			}
		}		
		
		
		$out = 'Company Add Handled this:<br>';
		foreach($jdat->data as $fld=>$dat)
			$out .= $fld.' with '.$dat.'<br>';
		return $out;
	}
}