<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 
	session_start();
	$_SESSION['count'] =1;

	$resp = getCData();

	if(!isset($_GET['callback'])){

			echo(json_encode($resp));

			return;
	}
	else{
			echo($_GET['callback'] . '(' .json_encode($resp).')');
			return;
	}




	function getCData(){


		//$news = dbMassData("SELECT * FROM news WHERE dateT !='0000-00-00 00:00:00' GROUP BY dateT ORDER BY dateT ASC");
		//$prices = dbMassData("SELECT * FROM minuteCoin WHERE tDate != '0000-00-00 00:00:00' GROUP BY tDate ORDER BY timestamp DESC LIMIT 100");
		$price = dbMassData("SELECT * FROM (SELECT * FROM coinbase WHERE price != 0 ORDER BY timestamp DESC LIMIT 240) t ORDER BY timestamp ASC"); //gets the last 240 rows then sorts them in asecending order
		//$resp = array("news"=>$news, "prices"=>$prices);
		$resp = array("price"=>$price);

		return $resp;
	}



?>