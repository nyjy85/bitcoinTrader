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
		$price = dbMassData("SELECT * FROM bitStamp WHERE price != 0 AND bid != 0 ORDER BY timestamp ASC LIMIT 240");
		//$resp = array("news"=>$news, "prices"=>$prices);
		$resp = array("price"=>$price);

		return $resp;
	}



?>