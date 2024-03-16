<?php
session_start();
if (!isset($_SESSION['SESS_USER_TOKEN']) || trim($_SESSION['SESS_USER_TOKEN']) == '') {
    header("location: login.php?expired");
}
$user = trim($_SESSION['SESS_USER_TOKEN']);
