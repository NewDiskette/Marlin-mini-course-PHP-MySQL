<?php
session_start();

$email = $_POST['emailverify'];
$password = $_POST['userpassword'];



include 'functions.php';
get_user_by_email($email);
add_user($email, $password);
