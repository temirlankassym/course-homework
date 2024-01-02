<?php
require_once 'database.php';

$database = new Database();
$database->createUser('John','Barry','test@mail');
print_r($database->getAllUsers());