<?php
include "db.php";
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM tugas WHERE id=$id");
header("Location: tugas.php");
?>
