<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 

	$resp = getPrices();


	echo(json_encode($resp));




	//prop

	function getPrices(){
	
			//echo($theDate);
			//echo("http://www.quandl.com/api/v1/datasets/BITCOIN/BITSTAMPUSD?auth_token=6sQU_EYPwHRMkJsReFG9");
			$info = file_get_contents("https://btc-e.com/api/3/ticker/btc_usd");
			$tInfo = json_decode($info, true);

			$price = $tInfo['btc_usd']['last'];
			$ask = $tInfo['btc_usd']['buy'];
			$bid = $tInfo['btc_usd']['sell'];
			$volume = $tInfo['btc_usd']['vol'];




			
			dbQuery("INSERT INTO btcec (price, ask, bid, volume) VALUES ($price, $ask, $bid, $volume)");
				//echo("INSERT INTO btcHistory (open, high, low, close, volume, volumeUSD, weightedPrice, avg, tDate) VALUES ($open, $high, $low, $close, $volume, $volumeC, $weightedPrice, $avg, '$theDate')");
			echo("INSERT INTO btcec (price, ask, bid, volume) VALUES ($price, $ask, $bid, $volume)");
		//return true  
		return $tInfo;
	}


?>