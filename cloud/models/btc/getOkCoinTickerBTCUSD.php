<?php
$dbcon = mysql_connect('localhost', 'okCoin', '??????' or die (mysql_error());
$dbsel = mysql_select_db('bitproj', $dbcon) or die (mysql_error());

		$x=true;
		while ($x = ture) {
                $resp = file_get_contents('https://www.okcoin.com/api/v1/ticker.do?symbol=btc_usd');
                                        $data = json_decode($resp, true);
                                        $date = $data['date'];
                                        $buy = $data['ticker']['buy'];
                                        $high = $data['ticker']['high'];
                                        $last = $data['ticker']['last'];
                                        $low = $data['ticker']['low'];
                                        $sell = $data['ticker']['sell'];
                                        $vol = $data['ticker']['vol'];
                $sql = "INSERT into okCoinTickerBTCCNY (buy, high, last, low, sell, vol, pair) VALUES ($buy, $high, $last, $low, $sell, $vol, 'BTCUSD')";
                $result = mysql_query($sql) or die (mysql_error());
        }

        mysql_close($dbcon);
?>