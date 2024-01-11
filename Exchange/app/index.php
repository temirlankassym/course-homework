<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Currency Exchange</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="from" placeholder="From" required>
        <input type="text" name="to" placeholder="To" required>
        <input type="submit" name="exchange">
    </form>
    <a href="history.php">View Exchange History</a>
</body>
</html>

<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Services\Database,App\Services\CurrencyExchange;

$db = new Database("ExchangeHistory", [
    'fromCurrency' => 'TEXT',
    'toCurrency' => 'TEXT'
]);

if(isset($_POST['exchange'])){
    $exchangeApi = new CurrencyExchange(
        'https://currency-exchange.p.rapidapi.com/exchange',
        [
            'X-RapidAPI-Key'=> '2ee0108639msh93241f35c5e2aacp124ed2jsnc22b57a43552',
            'X-RapidAPI-Host'=> 'currency-exchange.p.rapidapi.com',
        ],
        [
            'from' => $_POST['from'],
            'to' => $_POST['to'],
        ]
    );
    $db->insert([
        'fromCurrency' => $_POST['from'],
        'toCurrency' => $_POST['to']
    ]);

    echo 'Конвертация с валюты '.$_POST['from'].' в валюту '.$_POST['to'].': '.round($exchangeApi->get(),2);
}