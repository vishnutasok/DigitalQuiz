<?php
$conn = mysqli_connect("localhost", "root", "mytkeyroot") or die("Could not connect");
mysqli_select_db($conn,"db_general.salesdad.v2") or die("could not connect database");
$mysqli = new mysqli("localhost", "root", "mytkeyroot", "db_general.salesdad.v2");
?>
