<?php
function ping($host, $port, $timeout) {
    $a = gethostbyname('idontexist.tld');
    $b = gethostbyname($host);

    if ($a == $b)
        return false;

    $time = microtime(true);
    $fp = @fsockopen($host, $port, $errCode, $errStr, $timeout);
    $time = microtime(true) - $time;
    if ($fp) {
        fclose($fp);
        return $time;
    } else {
        return false;
    }
}
?>