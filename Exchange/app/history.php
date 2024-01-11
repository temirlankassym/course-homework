<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exchange History</title>
    <style>
        table {border-collapse: collapse;width: 100%;}
        th, td {border: 1px solid #dddddd;text-align: left;padding: 8px;}
        th {background-color: #f2f2f2;}
    </style>
</head>
<body>
    <h1>Exchange History</h1>
    <table>
        <tr>
            <th>id</th>
            <th>From</th>
            <th>To</th>
            <th>Created at</th>
        </tr>
        <?php
        require_once __DIR__ . '/../vendor/autoload.php';
        use App\Services\Database;

            $db = new Database('ExchangeHistory',[]);
            foreach($db->get() as $row){
                ?> <tr> <?php
                foreach($row as $item){?>
                    <th><?=$item?></th>
                <?php }
                ?> </tr> <?php
            }
        ?>
    </table>
</body>
</html>