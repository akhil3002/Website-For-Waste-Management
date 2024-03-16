<?php
session_start();
require_once("../../include/dbConnect.php");
include('../../include/helper.php');
$token = $_GET['token'];
$db->prepare("UPDATE posts SET approved = 1 WHERE token = '$token'")->execute();


$qry = $db->prepare("SELECT * FROM posts WHERE token = '$token'");
$qry->execute();
$rows = $qry->fetch();
$noti_to = $rows['created_by'];
$noti_from = trim($_SESSION['SESS_USER_TOKEN']);
$post_token = $token;
$notification = 'Approved by Admin. Post #' . $rows['id'] . ' - ' . ucwords($rows['title']) . ', please check it out for more information.';
$email_to = '';
Notify($noti_from, $noti_to, $post_token, $notification, $email_to, $db);

?>
<script>
    window.location.href = '../../post-details.php?token=<?php echo $token; ?>';
</script>