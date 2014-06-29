<?php

function pr3d_admin_sells() //&$form_state)
{
	//$nodes = db_query('SELECT nid,title FROM {node} WHERE type = :type',
	//	array(':type' => 'pr3d_company') ) -> fetchAll();

	$nodes = db_select('node','n')
		->condition('type','pr3d_company')
		->fields('n', array('nid','title'))
		->execute()
		->fetchAll();

	dsm($nodes);
	$options = array();
	foreach($nodes as $n)
		$options[ $n->nid ] = $n->title;
	
	$form = array();
	$form['cochoose'] = array(
		'#type' => 'select',
		'#title' => t('Which Company'),
		'#description' => 'Choose the Company that you want',
		'#options' => $options,
		//'#required' => true,
	);
	$form['button']['submit'] = array(
		'#type' => 'submit',
		'#value' => t('Sumbit'),
	);
	
	return $form;
}

function pr3d_admin_sells_validate(&$form, &$form_state)
{
	if( ! $form_state['values']['cochoose'] )
	{
		form_set_error('cochoose','YOU NEED TO CHOOSE A COMPANY!!!');
	}
}

function pr3d_admin_sells_submit(&$form, &$form_state)
{
	$form_state['redirect'] = 'pr3d_admin_prodwho/'.$form_state['values']['cochoose'];
}

function pr3d_admin_prodwho($co)
{
	$q = array();
	$q['foo'] = array(
		'#type' => 'markup',
		'#markup' => '<b>You Chose: '.$co.'</b>',
	);
	return render($q);
}

