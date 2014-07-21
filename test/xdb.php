<?php

class xdb
{
var $link, $dbname;

	function __construct()
	{
		$this->link = null;
		$this->dbname = '';
	}
	
	function connect($hst,$usr,$psw,$dbname)
	{
		$this->link = mysqli_connect($hst,$usr,$psw,$dbname);
		if (mysqli_connect_errno()) 
		{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		return false;
		}
		return true;
	}
	
	function close()
	{
		mysqli_close($this->link);
	}
	
	function arr2flds($arr)
	{
		$o = '';
		foreach($arr as $k=>$v)
		{
			if(!empty($o)) $o.=',';
			$o .= "'$k'='$v'";
		}
		return $o;
	}
	
	function insert($tbl, $fvs, $retfld='')
	{
		$sql = 'INSERT INTO '.$tbl.' SET '.$fvs;
		//return $sql;
		//exit;
		if ( ! mysqli_query($this->link,$sql)) 
		{
  		die('Error: ' . mysqli_error($this->link));
  		return false;
		}
		if(!empty($retfld))
		{
			$lid = mysqli_insert_id($this->link);
//			$sql = 'SELECT '.$retfld.' FROM '.$tbl.' WHERE ';
			return $lid;
		}
		return true;
	}
	
	function select($tbl, $fl='*',$wh='')
	{
		$sql = 'SELECT '.$fl.' FROM '.$tbl;
		if($wh) $sql .= ' WHERE '.$wh;
		$result = mysqli_query($this->link,$sql);

		$out = array();	
		$c=0;
		while($row = mysqli_fetch_array($result)) 
		{
		  $out[$c++] = $row;
		}
		return $out;
	}

	// Drupal Field Specific writer
	function write_field_info($node_id, $bundle, $fldname, $fldval, $update=false,$altfld='')
	{
		if($update)
		{
			$sql = "UPDATE 'field_data_field_$fldname' SET 'bundle'='$bundle',";
			if(!empty($altfld))
				$sql .= "'field_".$altfld."'='$fldval' ";
			else
				$sql .= "'field_".$fldname."_value'='$fldval' ";
			$sql .= "WHERE 'entity_id'='$node_id'";
		}
		else
		{
			$sql = "INSERT INTO 'field_data_field_$fldname' SET 'bundle'='$bundle','entity_id'='$node_id',";
			if(!empty($altfld))
				$sql .= "'field_".$altfld."'='$fldval'";
			else
				$sql .= "'field_".$fldname."_value'='$fldval'";
		}
		if ( ! mysqli_query($this->link,$sql)) 
		{
  		die('Error: ' . mysqli_error($this->link));
  		return false;
		}
		return true;
	}

}