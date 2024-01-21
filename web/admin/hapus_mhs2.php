<?php

require "../config.php";
$id = $_GET["id"];
$ide = $_GET["ide"];
$idm = $_GET["idm"];


$query = "DELETE FROM mahasantri WHERE id = $id";

mysqli_query($connect, "$query");

header("location: mentor.php?id=$idm&&ide=$ide");
