<?php
require_once("../../include/dbConnect.php");
$token = $_GET['token'];
$db->prepare("UPDATE users SET status = IF(status = 1, 0, 1) WHERE token = '$token'")->execute();

if($_GET['ret'] == 'vendors'){
?>
<script>
    window.location.href = '../../vendors.php';
</script>
<?php } else {?>
<script>
    window.location.href = '../../buyers.php';
</script>
<?php } ?>