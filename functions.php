<?php
include 'path.php';
include 'flash.php';

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
  
        $name = 'email is busy';
        $message = '<strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем.';
        flash($name, $message, FLASH_WARNING);die;
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

    $name = 'registered';
    $message = 'Регистрация успешна';
    flash($name, $message, FLASH_SUCCESS);
}

/* 
        Parametrs:
            string - $path
        
        Description: перенаправить на другую страницу

        Return value: null
*/
function redirect_to($path) {
    header($path);
}
