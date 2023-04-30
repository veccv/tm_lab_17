<HTML>
<HEAD>
</HEAD>
<BODY>
<form method="POST" action="kasuj2.php">
    <?php
    include 'Database.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    $listOfHosts = mysqli_fetch_all(Database::getConnection()->query("SELECT * FROM domeny WHERE user_id=$user_id"));
    echo '<label for="host">Wybierz host do usunięcia</label>';
    echo '<br>';
    echo '<select name="host" id="host">';
    echo '<option value="">--Wybierz host--</option>';
    foreach ($listOfHosts as $host) {
        echo '<option value="' . $host[0] . '">' . $host[1] . '</option>';
    }
    echo '</select>';
    ?>
    <button type="submit">Usuń wybrany host
    </button>
</form>
</BODY>
</HTML>