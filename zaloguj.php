<?php
include 'Database.php';

$email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
$pass = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

session_start();

Database::getConnection()->query("SET NAMES 'utf8'");
$rekord = mysqli_fetch_array(Database::getConnection()->query("SELECT * FROM users WHERE username='$email'"));

if (!$rekord)
{
    Database::getConnection()->close();
    header('Location: login.php');

} else {
    if ($rekord['password'] == $pass)
    {
        echo "Logowanie Ok. User: {$rekord['username']}. Hasło: {$rekord['password']}";
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['login'] = $email;
        $_SESSION['user_id'] = $rekord['id'];

        header('Location: index.php');
    } else {
        Database::getConnection()->close();
        header('Location: login.php');

    }
}