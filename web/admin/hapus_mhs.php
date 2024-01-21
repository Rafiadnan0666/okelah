<?php

require "../config.php";
$id = $_GET["id"];
$ide = $_GET["ide"];


$query = "DELETE FROM mahasantri WHERE id = $id";

mysqli_query($connect, "$query");

header("location: admin.php?id=$ide");

?>