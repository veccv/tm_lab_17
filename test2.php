<?php
$file = fopen ("https://www.wp.pl54389789534785", "r");
if (!$file) {
    echo "<p>Unable to open remote file.\n";
    exit;
}