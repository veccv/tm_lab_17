<body> 
<?php
include 'Database.php';
print "<TABLE CELLPADDING=5 BORDER=1>";
print "<TR><TD>id</TD><TD>Host</TD><TD>Port</TD></TR>\n";
foreach (mysqli_fetch_all(Database::getConnection()->query("SELECT * FROM domeny")) as $wiersz) {
    $id = $wiersz[0];
    $host = $wiersz[1];
    $port = $wiersz[2];
    print "<TR><TD>$id</TD><TD>$host</TD><TD>$port</TD></TR>\n";
}
print "</TABLE>";
Database::getConnection()->close();
?>
</body>