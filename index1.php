<?php declare(strict_types=1);
session_start();
$session = $_SESSION['loggedin'];

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Twój Opis">
    <meta name="author" content="Twoje dane">
    <meta name="keywords" content="Twoje słowa kluczowe">
    <title>Dalmer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <style type="text/css" class="init"></style>
    <link rel="stylesheet" type="text/css" href="twoj_css.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="twoj_js.js"></script>
    <style>
        .company-logo {
            display: flex;
            position: relative;
            width: 600px;
            height: 300px;
        }

        #employee-photo {
            position: absolute;
            display: inline-block;
        }
    </style>
</head>

<body onload="myLoadHeader()" style="background-color: rgba(138,142,160,0.32);">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top mt-0 mb-0 ms-0 me-0 pt-0 pb-0 ps-0 pe-0">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Konto</a>
                            <ul class="dropdown-menu">
                                <?php
                                if ($session) {
                                    echo '<li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Wyloguj się </a></li>';
                                } else {
                                    echo '<li><a class="dropdown-item" href="login.php"> Logowanie </a></li>';
                                    echo '<li><a class="dropdown-item" href="register.php"> Rejestracja </a></li>';
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                        if ($session) {
                            echo '<li class="nav-item dropdown">';
                            echo '<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Hosty</a>';
                            echo '<ul class="dropdown-menu">';
                            echo '<li><a class="dropdown-item" href="index1.php"> Lista twoich hostów </a></li>';
                            echo '<li><a class="dropdown-item" href="update.php"> Lista twoich hostów AJAX </a></li>';
                            echo '<li><a class="dropdown-item" href="dodaj1.php"> Dodaj nowy host </a></li>';
                            echo '<li><a class="dropdown-item" href="kasuj1.php"> Usuń host </a></li>';
                            echo '</ul>';
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>

    </div>
</header>
<div style="margin-top: 2%" id='myHeader'></div>
<main>
    <section class="sekcja1">
        <div class="container-fluid p-4">
            <?php
            include 'Database.php';
            include 'test_ping.php';
            print "<TABLE CELLPADDING=5 BORDER=1>";
            print "<TR><TD>id</TD><TD>Host</TD><TD>Port</TD><TD>Stan</TD></TR>\n";
            $user_id = $_SESSION['user_id'];
            foreach (mysqli_fetch_all(Database::getConnection()->query("SELECT * FROM domeny WHERE user_id=$user_id")) as $wiersz) {
                $id = $wiersz[0];
                $host = $wiersz[1];
                $port = $wiersz[2];
                $stan = ping($host, 80, 1);
                if (strlen((string)$stan) > 0) {
                    $stan = "Online";
                } else {
                    $stan = "Offline";
                }

                print "<TR><TD>$id</TD><TD>$host</TD><TD>$port</TD><TD>$stan</TD></TR>\n";
            }
            print "</TABLE>";
            Database::getConnection()->close();
            ?>
        </div>
    </section>
</main>
</body>
</html>