<head>
    <meta http-equiv=“refresh” content=“10” />
</head>
<body>
<?php
include 'Database.php';
print "<TABLE CELLPADDING=5 BORDER=1>";
print "<TR><TD>id</TD><TD>Host</TD><TD>Port</TD><TD>Stan</TD></TR>\n";
foreach (mysqli_fetch_all(Database::getConnection()->query("SELECT * FROM domeny")) as $wiersz) {
    $id = $wiersz[0];
    $host = $wiersz[1];
    $port = $wiersz[2];
    $fp = @fsockopen($host, $port, $errno, $errstr, 30);
    if ($fp) {
        $stan = "Ok";
    } else {
        $stan = "$errno $errstr";
    }
    print "<TR><TD>$id</TD><TD>$host</TD><TD>$port</TD><TD>$stan</TD></TR>\n";
}
print "</TABLE>";
Database::getConnection()->close();
?>
</body>