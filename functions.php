<?php
include 'path.php';

/* 
        Parametrs:
            string - $email
        
        Description: поиск пользователя по эл. адресу

        Return value: array
*/
function get_user_by_email($email) {
    $sql = "SELECT `email` FROM `users`";
    include 'connect.php';
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $arrayEmailDB = $statement->fetchAll(PDO::FETCH_ASSOC);
    $arrayEmail = array("email" => $email);
    
    if (in_array($arrayEmail, $arrayEmailDB)){
        $path = 'Location:' . $BASE_URL . 'page_register.php';
        redirect_to($path);
        include 'flash.php';
        $name = 'email is busy';
        $message = '<div class="alert alert-danger text-dark" role="alert">
        <strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем.
        </div>';
        flash($name, $message, FLASH_INFO);die;
    }
}

/* 
        Parametrs:
            string - $email
            string - $password
        
        Description: добавить пользователя в БД

        Return value: int (user_id)
*/
function add_user($email,$password) {
    $sql = "INSERT INTO `users` (email, password) VALUES (:email, :password)";
    include 'connect.php';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":password", $password);
    $statement->execute();
    $path = 'Location:' . $BASE_URL . 'page_login.php';
    redirect_to($path);
    include 'flash.php';
    $name = 'registered';
    $message = 'Регистрация успешна';
    $type = 'success';
    $flash_message = $_SESSION[FLASH][$name];
    create_flash_message($name, $message, $type);
    format_flash_message($flash_message);
    display_flash_message($name);
}

/* 
        Parametrs:
            string - $name (ключ)
            string - $message (значение, текст сообщения)
        
        Description: подготовить флеш сообщение

        Return value: null
*/
// function set_flash_message($name,$message) {}

/* 
        Parametrs:
            string - $name (ключ)
        
        Description: вывести флеш сообщение

        Return value: null
*/
// function display_flash_message($name) {}

/* 
        Parametrs:
            string - $path
        
        Description: перенаправить на другую страницу

        Return value: null
*/
function redirect_to($path) {
    header($path);
}





