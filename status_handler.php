<?php
session_start();
include 'function.php';
$id = $_SESSION['id'];
$status = $_POST['status'];
$task = get_user_by_id($id);

set_status($status,$id);
set_flash_message('upload', 'Статус успешно обновлен');
redirect_to('page_profile.php?id='.$id);
?>