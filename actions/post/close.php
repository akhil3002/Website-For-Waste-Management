<?php
session_start();
require_once("../../include/dbConnect.php");
include('../../include/helper.php');
$token = $_GET['token'];
$db->prepare("UPDATE posts SET closed = 1 WHERE token = '$token'")->execute();

?>
<script>
    window.location.href = '../../post-details.php?token=<?php echo $token; ?>';
</script>