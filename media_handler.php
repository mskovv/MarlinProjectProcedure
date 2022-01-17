<?php
session_start();
include 'function.php';
$id = $_SESSION['id'];
$avatar_name = $_FILES['avatar']['name'];
$avatar_location = $_FILES['avatar']['tmp_name'];

upload_avatar($avatar_name,$avatar_location, $id);
set_flash_message('upload', 'Профиль успешно обновлен.');
redirect_to('page_profile.php?id='.$id);
?>