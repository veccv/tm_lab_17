<HTML>
<HEAD>
</HEAD>
<BODY>
<form method="POST" action="kasuj2.php">
    <?php
    include 'Database.php';
    $listOfHosts = mysqli_fetch_all(Database::getConnection()->query("SELECT * FROM domeny"));
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