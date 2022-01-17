<?php
session_start();
include 'function.php';
$email = $_POST['email'];
$password = $_POST['password'];
$task = get_user_by_email($email);
$id = $_SESSION['id'];

if(!isset($task['reg_email']) || $_SESSION['log-in'] === $email){
  edit_credentials($email, $password, $id);
  set_flash_message('upload', 'Данные успешно обновлены');
  redirect_to('page_profile.php?id='.$id);
  $_SESSION['log-in'] = $email;
  exit;
}

set_flash_message('danger', 'Данный email уже занят другим пользователем.' );
redirect_to('security.php?id='.$id)
?>
