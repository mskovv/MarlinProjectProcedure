<?php

session_start();
unset($_SESSION['log-in']);
unset($_SESSION['admin']);

$email = $_POST['email'];
$password = $_POST['password'];

include('function.php');

$task = get_user_by_email($email);
$hash_password = password_hash($password, PASSWORD_DEFAULT);

if($task !== null){
  if(password_verify($password, $task['password'])){
    redirect_to('users.php');
    $_SESSION['name'] = $task['name'];
    $_SESSION['surname'] = $task['surname'];
    $_SESSION['log-in'] = $email;

    if($task['role'] == "admin"){
      $_SESSION['admin'] = 'admin';
    }
    exit;
  }
}
  set_flash_message('danger','Неверный логин или пароль');
  redirect_to('page_login.php');
?>