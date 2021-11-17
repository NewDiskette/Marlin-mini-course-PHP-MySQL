<?php
/* 
        Parametrs:
            string - $email
        
        Description: поиск пользователя по эл. адресу

        Return value: array
*/
function get_user_by_email($email) {}

/* 
        Parametrs:
            string - $email
            string - $password
        
        Description: добавить пользователя в БД

        Return value: int (user_id)
*/
function add_user($email,$password) {}

/* 
        Parametrs:
            string - $name (ключ)
            string - $message (значение, текст сообщения)
        
        Description: подготовить флеш сообщение

        Return value: null
*/
function set_flash_message($name,$message) {}

/* 
        Parametrs:
            string - $name (ключ)
        
        Description: вывести флеш сообщение

        Return value: null
*/
function display_flash_message($name) {}

/* 
        Parametrs:
            string - $path
        
        Description: перенаправить на другую страницу

        Return value: null
*/
function redirect_to($path) {}
