<?php
include 'function.php';
$id = $_GET['id'];

if(isset($_SESSION['admin'])){
delete_user($id);
set_flash_message('upload','Пользователь успешно удален.');
redirect_to('users.php');
exit;
}
delete_user($id);
unset($_SESSION['log-in']);
redirect_to('page_login.php');

?>