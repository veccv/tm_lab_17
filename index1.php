<head>
    <meta http-equiv=“refresh” content=“10”/>
</head>
<body>
<?php
include 'Database.php';
include 'test_ping.php';
session_start();
print "<TABLE CELLPADDING=5 BORDER=1>";
print "<TR><TD>id</TD><TD>Host</TD><TD>Port</TD><TD>Stan</TD></TR>\n";
$user_id = $_SESSION['user_id'];
foreach (mysqli_fetch_all(Database::getConnection()->query("SELECT * FROM domeny WHERE user_id=$user_id")) as $wiersz) {
    $id = $wiersz[0];
    $host = $wiersz[1];
    $port = $wiersz[2];
    $stan = ping($host, 80, 1);
    if (strlen($stan) > 0) {
        $stan = "Online";
    } else {
        $stan = "Offline";
    }

    print "<TR><TD>$id</TD><TD>$host</TD><TD>$port</TD><TD>$stan</TD></TR>\n";
}
print "</TABLE>";
Database::getConnection()->close();
?>
</body>