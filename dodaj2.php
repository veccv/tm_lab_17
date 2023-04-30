<?php
include 'Database.php';

$host = $_POST['host'];
$port = $_POST['port'];
Database::getConnection()->query("INSERT INTO domeny (host, port) VALUES ('$host', $port)");

Database::getConnection()->close();

header('Location: update.php');