<?php
session_start();
function connect_to_db(){
  return $pdo = new PDO('mysql:dbname=project1;host=localhost','mysql','');
}

function get_user_by_email($email){
  $pdo = connect_to_db();
  $sqlSelectEmail = "SELECT * FROM `users` WHERE reg_email = :email";
  $stmt = $pdo->prepare($sqlSelectEmail);
  $stmt->execute(['email' => $email]);
  $task = $stmt->fetch(PDO::FETCH_ASSOC);
  return $task;
}

function get_user_by_id($id){
  $sqlSelectId = "SELECT * FROM `users` WHERE id = :id";
  $pdo = connect_to_db();
  $stmt = $pdo->prepare($sqlSelectId);
  $stmt->execute(['id' => $id]);
  $task = $stmt->fetch(PDO::FETCH_ASSOC);
  return $task;
}

function add_user($email,$password){
  $pdo = connect_to_db();
  $sqlInsertEmail = "INSERT INTO `users` (`reg_email`,`password`) VALUES (:email,:password)";
  $stmt = $pdo->prepare($sqlInsertEmail);
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  $stmt->execute(['email' => $email,'password' => $hash_password]);
  $task = get_user_by_email($email);
  return $task['id'];
}

function set_flash_message($key, $message){
  $_SESSION[$key] = $message;
}

function display_flash_message($key){}

function redirect_to($path){
  header("Location: $path");
}

function is_not_logged(){
  if(!isset($_SESSION['log-in'])){//если пользователя нет в сессиии
    return true;
  }else{
    return false;
  }
}

function set_status($status, $id){
  $pdo = connect_to_db();
  $sqlUpdateStatus = "UPDATE `users` SET `status` = :status WHERE `users`.`id` = :id ";
  $stmt = $pdo->prepare($sqlUpdateStatus);
  $stmt->execute(['status' => $status, 'id' => $id]);
}

function add_social_links($vk, $telegramm, $instagram,$id){
  $pdo = connect_to_db();
  $sqlAddSocial = "UPDATE `users` SET `inst` = :instagram, `vk` = :vk, `telegramm` = :telegramm WHERE `users`.`id` = :id";
  $stmt = $pdo->prepare($sqlAddSocial);
  $stmt->execute([
  'instagram' => $instagram,
  'vk'=> $vk,
  'telegramm'=> $telegramm,
  'id' => $id
]);
}

function upload_avatar($name,$location,$id){
  $task =get_user_by_id($id);
  if(file_exists('uploads/'.$task['avatar'])){
    unlink('uploads/'.$task['avatar']);
  }
  $pdo = connect_to_db();
  $sqlUpdateAvatar = "UPDATE `users` SET avatar = :avatar WHERE users.id = :id";
  $stmt = $pdo->prepare($sqlUpdateAvatar);
  $image_extension = pathinfo($name);
  $result = uniqid() . '.' . $image_extension['extension'];
  $stmt ->execute(
    [
    'avatar' => $result,
    'id' => $id
    ]);
  move_uploaded_file($location, 'uploads/'.$result);
}

function edit_info($name, $surname, $title, $phone, $location, $id){
  $sqlUpdateInfoUsers = "UPDATE `users` SET `name` = :name, `surname` = :surname, `title` = :title, `phone` = :phone, `location` = :location WHERE `users`.`id` = :id";
  $pdo = connect_to_db();
  $stmt = $pdo->prepare($sqlUpdateInfoUsers);
  $stmt->execute([
    'name' => $name,
    'surname' => $surname,
    'title' => $title,
    'phone' => $phone,
    'location' => $location,
    'id' => $id,
  ]);
}

function is_author($logged_user_id,$edit_user_id){
  if($logged_user_id === $edit_user_id){
    return true;
  }else{
    return false;
  }
}

function edit_credentials($email,$password,$user_id){
  $sql_edit_credentials = "UPDATE `users` SET `reg_email` =:email, `password` =:password WHERE `users`.`id` =:id";
  $pdo = connect_to_db();
  $stmt = $pdo->prepare($sql_edit_credentials);
  $stmt->execute(['email' => $email, 'password' =>password_hash($password, PASSWORD_DEFAULT), 'id' => $user_id]);
}

function has_image($id){
  $sql_check_image = "SELECT `avatar` from `users` WHERE `id` = :id";
  $pdo = connect_to_db();
  $stmt = $pdo ->prepare($sql_check_image);
  $stmt->execute(['id' => $id,]);
  $task = $stmt->fetch(PDO::FETCH_ASSOC);
  return $task['avatar'];
}

function delete_user($user_id){
  $sql_drop_user = "DELETE FROM `users` WHERE `users`.`id` = :id";
  $pdo = connect_to_db();
  $stmt = $pdo->prepare($sql_drop_user);
  $stmt->execute(['id' => $user_id]);
}
?>

