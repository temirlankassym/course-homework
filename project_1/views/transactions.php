<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            body{
                font-family: Arial,sans-serif;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction){?>
                <tr>
                    <?php foreach ($transaction as $key => $cell){?>
                            <?php
                                include_once "../app/helpers.php";
                                if($key=="Date"){?>
                                    <td><?= formatDate($cell)?></td>
                                <?php }
                                else if($key=="Amount"){
                                    if ($cell[0]=="-"){?>
                                        <td style="color: red"><?= $cell ?></td>
                                    <?php }
                                    else{?>
                                        <td style="color: green"><?= $cell ?></td>
                                    <?php }
                                }
                                else {?>
                                        <td>
                                        <?=$cell?>
                                        </td>
                                <?php }?>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold">Total Income:</td>
                    <td><?php
                            include_once "../app/helpers.php";
                            echo getTotalIncome($transactions)."$";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold">Total Expense:</td>
                    <td><?php
                            include_once "../app/helpers.php";
                            echo getTotalExpense($transactions)."$";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold">Net Total:</td>
                    <td><?php
                            include_once "../app/helpers.php";
                            echo getTotalIncome($transactions)+getTotalExpense($transactions)."$";
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>