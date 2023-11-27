<?php
    function formatDate(string $dateFormat): string{
        $date = date_create($dateFormat);
        return date_format($date, 'M j, Y');
    }

    function getTotalIncome(array $transactions): float{
        $income = 0;
        foreach($transactions as $tr){
            if ($tr['Amount'][0] == '$')
                $income += floatval(str_replace(',','',substr($tr['Amount'],1)));
        }
        return $income;
    }

    function getTotalExpense(array $transactions): float{
        $expense = 0;
        foreach($transactions as $tr){
            if ($tr['Amount'][0] == '-')
                $expense -= floatval(str_replace(',','',substr($tr['Amount'],2)));
        }
        return $expense;
    }