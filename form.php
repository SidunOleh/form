<?php

require_once 'log.php';

$email = $_POST['email'] ?? '';
$pass  = $_POST['password'] ?? '';
$passConfirm = $_POST['passsword_confirm'] ?? '';

$errors = [];

// validaton
if (! preg_match('/@/', $email)) {
    $errors[] = 'Email has to contain @.';
}

if ($pass != $passConfirm) {
    $errors[] = 'Passwords dont\'t match.';
}

// checking for existence
$users = require('users.php');

$exist = false;
foreach ($users as $user) {
    if ($user['email'] == $email) {
        $exist = true;
    }
}

if ($exist) {
    Log::write($errors[] = 'User with such email exists.');
}

if (! $exist) {
    Log::write('User with such email doesn\'t exist');
}

// response
if ($errors) {
    echo json_encode(['status'=>false,'errors'=>$errors,]);
}

if (! $errors) {
    echo json_encode(['status'=>true,]);
}
