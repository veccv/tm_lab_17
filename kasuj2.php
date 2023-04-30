<?php
include 'Database.php';

$host = $_POST['host'];
Database::getConnection()->query("DELETE FROM domeny WHERE id=$host");

Database::getConnection()->close();

header('Location: update.php');