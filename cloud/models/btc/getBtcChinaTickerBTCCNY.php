<?php
$dbcon = mysql_connect('localhost', 'btcChina', 'fPSbKaeYjLsHNEnQ') or die (mysql_error());
$dbsel = mysql_select_db('btcChina', $dbcon) or die (mysql_error());

        $x = true;
        while ($x = true) {
                $resp = file_get_contents('https://data.btcchina.com/data/ticker?market=btccny');
                                        $data = json_decode($resp, true);
                                        $high = $data['ticker']['high'];
                                        $low = $data['ticker']['low'];
                                        $buy = $data['ticker']['buy'];
                                        $sell = $data['ticker']['sell'];
                                        $last = $data['ticker']['last'];
                                        $vol = $data['ticker']['vol'];
                                        $date = $data['ticker']['date'];
                                        $vwap = $data['ticker']['vwap'];
                                        $prev_close = $data['ticker']['prev_close'];
                                        $open = $data['ticker']['open'];
                                        
                                        
                                        
                                        

                $sql = "INSERT into btcChinaTickerBTCCNY (high, low, buy, sell, last, vol, vwap, prev_close, open) VALUES ($high, $low, $buy, $sell, $last, $vol, $vwap, $prev_close, $open)";
                $result = mysql_query($sql) or die (mysql_error());
        sleep(10);
        }
        mysql_close($dbcon);
?>