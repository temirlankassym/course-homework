<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH."App.php";
require APP_PATH."helpers.php";

$files = getFiles(FILES_PATH);

$transactionsIdxs = [];
foreach($files as $file){
    $transactionsIdxs = array_merge($transactionsIdxs,getTransactions($file));
}
unset($transactionsIdxs[0]);

$transactions = [];
$keys = ["Date","Check","Description","Amount"];
foreach($transactionsIdxs as $tr){
    $transactions[] = array_combine($keys,$tr);
}

require VIEWS_PATH."transactions.php";