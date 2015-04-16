<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	
	ini_set('display_errors',1);  error_reporting(E_ALL); 

	extract($_REQUEST);
	
	$resp = getData($sum, $value, $price, $amount);
	echo(json_encode($resp));
	//prop

	function getData($sum, $value, $price, $amount){
		dbQuery("INSERT INTO bitstampBot (sum, value, price, amount) VALUES ($sum, $value, $price, $amount)");
		return array("status"=>"success");

	}
?>