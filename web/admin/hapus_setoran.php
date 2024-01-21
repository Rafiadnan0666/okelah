<?php

require "../config.php";
$id = $_GET["id"];
$ids = $_GET["ids"];
$ide = $_GET["ide"];
$idm = $_GET["idm"];


$query = "DELETE FROM setoran WHERE id=$ids";

mysqli_query($connect, $query);

header("location: mahasantri.php?id=$id&&idm=$idm&&ide=$ide");
