<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	
	ini_set('display_errors',1);  error_reporting(E_ALL); 
	
	$resp = getData();
	echo(json_encode($resp));
	//prop
	function getData(){
	
		
		
		$resp = dbMassData("SELECT * FROM (SELECT * FROM bitfinex ORDER BY timestamp DESC LIMIT 240) t ORDER BY timestamp ASC");
		$resp1 = dbMassData("SELECT * FROM (SELECT * FROM bitStamp ORDER BY timestamp DESC LIMIT 240) t ORDER BY timestamp ASC");
		$resp2 = dbMassData("SELECT * FROM (SELECT * FROM btcec WHERE price != 0 AND bid != 0 ORDER BY timestamp DESC LIMIT 240) t ORDER BY timestamp ASC"); //gets the last 240 rows then sorts them in asecending order

		$allResp = array(); // sets up an empty array
		$allResp[0] =  $resp; // assigns the bifinex db to the 0th index
		$allResp[1]= $resp1; // assigns the bitStamp db to the 1st index
		$allResp[2] = $resp2; // assigns the btcec db to the 2nd index
		return $allResp; // returns the array
	}
?>