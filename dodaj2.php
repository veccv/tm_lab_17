<?php
include 'Database.php';

$host = $_POST['host'];
$port = $_POST['port'];
session_start();
$user_id = $_SESSION['user_id'];
Database::getConnection()->query("INSERT INTO domeny (host, port, user_id) VALUES ('$host', $port, $user_id)");

Database::getConnection()->close();

header('Location: update.php');