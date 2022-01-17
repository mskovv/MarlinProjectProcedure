<?php
  session_start();
  $email = $_POST['email'];
  $password = $_POST['password'];
  include ('function.php');


  if(!get_user_by_email($email) == null){
    set_flash_message('alert', 'Этот эл.адрес  уже занят другим пользователем.');
    redirect_to('page_register.php');
    exit;
  }

  add_user($email, $password);
  redirect_to('page_login.php');
  set_flash_message('success', 'Вы успешно зарегестрированы');

?>