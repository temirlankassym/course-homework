<?php
require_once 'database.php';
require_once 'BaseModel.php';
require_once 'UserModel.php';

$user = new UserModel("users");

$user->insert(['username'=>'Tim','email'=>'mail@','password'=>'123']);
$user->update('username','John',1);
print_r($user->get("users"));