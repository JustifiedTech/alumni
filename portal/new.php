<?php
include('function.php');
$current_time =strtotime(date('Y-m-d H:i:s'). '-10 second');
$current_time =date('Y-m-d H:i:s', $current_time);
$user_last_activity=get_user_last_activity($indv['users_id'], $connect);

if ($user_last_activity > $current_time) {
  require_once('all.php');
}

?>
