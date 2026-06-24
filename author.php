<?php
if(isset($_POST)) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}

echo 'Привет, ' . $name . '! Ты успешно авторизовался'
?>