<?php
$server = 0;
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'scrap_mini';
$url = 'http://wastemanagement.localhost/';
if ($server == 1) {
    $db_host        = 'localhost';
    $db_user        = 'ewolweDefault';
    $db_pass        = 'bwa@R3Vl[UVQ';
    $db_database    = 'ewolwe_scrap_mini';
    $url = 'https://scrap.krabd.com/';
}
$db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
