<?php
include "config.php";
session_start();

$camp_id = $_GET["camp_id"];

$quary = "DELETE FROM tbl_227_camp WHERE id_camp=".$camp_id;

$result = mysqli_query($connection, $quary)or die('Quary delete is failed' . mysqli_error($connection));
header("location:existcamp.php");



?>

