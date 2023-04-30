<?php
include "Database.php";

$login = $_POST['login'];
$password = $_POST['password'];

Database::getConnection()->query("INSERT INTO users (username, password) VALUES ('$login', '$password')");
Database::getConnection()->close();

header('Location: login.php');