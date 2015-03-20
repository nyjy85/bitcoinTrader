<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 

	$resp = getPrices();


	echo(json_encode($resp));




	//prop

	function getPrices(){
	
			//echo($theDate);
			//echo("http://www.quandl.com/api/v1/datasets/BITCOIN/BITSTAMPUSD?auth_token=6sQU_EYPwHRMkJsReFG9");
			$info = file_get_contents("https://api.bitfinex.com/v1/pubticker/btcusd");
			$tInfo = json_decode($info, true);

			$last_price = $tInfo['last_price'];
			$ask = $tInfo['ask'];
			$bid = $tInfo['bid'];
			$volume = $tInfo['volume'];




			
			dbQuery("INSERT INTO bitfinex (last_price, ask, bid, volume) VALUES ($last_price, $ask, $bid, $volume')");
				//echo("INSERT INTO btcHistory (open, high, low, close, volume, volumeUSD, weightedPrice, avg, tDate) VALUES ($open, $high, $low, $close, $volume, $volumeC, $weightedPrice, $avg, '$theDate')");
			echodbQuery("INSERT INTO bitfinex (last_price, ask, bid, volume) VALUES ($last_price, $ask, $bid, $volume')");
		//return true  
		return $rData;
	}


?>