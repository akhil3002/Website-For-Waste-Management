<?php
require_once("../../include/dbConnect.php");
$token = $_GET['token'];
$db->prepare("UPDATE posts SET status = IF(status = 1, 0, 1) WHERE token = '$token'")->execute();
?>
<script>
    window.location.href = '../../myposts.php';
</script>