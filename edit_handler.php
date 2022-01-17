<?php
include 'function.php';
session_start();
$name = $_POST['name'];
$surname = $_POST['surname'];
$title = $_POST['title'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$id = $_SESSION['id'];

$upload = 'Профиль успешно обновлен.';

edit_info($name,$surname,$title,$phone,$location,$id);
set_flash_message('upload',$upload);
redirect_to('page_profile.php?id='.$id)
?>