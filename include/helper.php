<?php
function genToken()
{
    return 't' . sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
}
date_default_timezone_set("Asia/Kolkata");
$current_date_local = date("Y-m-d", time());
$current_date_time_local = date("Y-m-d H:i:s", time());
$current_date_time_local_plus_2 = date('Y-m-d H:i:s', strtotime('+8 hour', strtotime($current_date_time_local)));
date_default_timezone_set('UTC');
$current_date_time = date("Y-m-d H:i:s", time());


function time_convert($date)
{
    $date = date_create($date);
    return date_format($date, "d/m/Y h:i A");
}

function date_convert($date)
{
    $date = date_create($date);
    return date_format($date, "d/m/Y");
}


function Notify($noti_from, $noti_to, $post_token, $notification, $email_to, $db)
{
    // $to = $email_to;
    // $subject = 'Notification from Waste Catalogue';
    // $headers = "From: vysakhwarrier2001@gmail.com\r\nReply-To: vysakhwarrier2001@gmail.com";
    // $mail_sent = @mail($to, $subject, $notification, $headers);
    $db->prepare("INSERT INTO notification (noti_from, noti_to, post_token, notification) VALUES ('$noti_from', '$noti_to', '$post_token', '$notification')")->execute();

    // return $mail_sent ? "" : "";
}
