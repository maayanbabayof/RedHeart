<?php
include "config.php";
session_start();

$camp_id = $_GET["camp_id"];

$quary = "UPDATE  FROM tbl_227_camp WHERE id_camp=".$camp_id;