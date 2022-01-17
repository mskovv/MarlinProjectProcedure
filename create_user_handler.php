<?php
include 'function.php';
$sqlInsert = 'INSERT INTO `users` (`name`, `surname`, `title`, `reg_email`, `password`, `phone`, `inst`, `vk`, `telegramm`, `avatar`, `location`, `status`) VALUES (:name, :surname, :title, :reg_email , :password, :phone, :inst, :vk, :telegramm, :avatar, :location, :status)';

$name = $_POST['name'];
$surname = $_POST['surname'];
$title = $_POST['title'];//место работы
$phone = $_POST['phone'];
$reg_email = $_POST['reg_email'];
$password = $_POST['password'];
$status = $_POST['status'];
$avatar_name = $_FILES['avatar']['name'];
$avatar_location = $_FILES['avatar']['tmp_name'];
$location = $_POST['location'];//адрес
$vk = $_POST['vk'];
$telegramm = $_POST['telegramm'];
$inst = $_POST['inst'];

$task = get_user_by_email($reg_email);
if($task != null){
  $danger = 'Данный Email уже зарегестрирован';
  set_flash_message('danger',$danger);
  redirect_to('create_user.php');
  exit;
}

$id = add_user($reg_email, $password);
edit_info($name,$surname,$title, $phone, $location, $id);
set_status($status,$id);
upload_avatar($avatar_name,$avatar_location,$id);
add_social_links($vk, $telegramm, $inst, $id);

$upload = 'Профиль успешно добавлен.';
set_flash_message('upload',$upload);
redirect_to('users.php');
?>