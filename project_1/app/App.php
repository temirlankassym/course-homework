<?php
    function getFiles(string $path): array{
        $scan = scandir($path);

        $files = [];
        foreach ($scan as $file){
            if(!is_dir($file))
                $files[] = $path.$file;
        }

        return $files;
    }

    function getTransactions(string $fileName): array{
        if(!file_exists($fileName))
            echo "File not found";

        $transactions = [];
        $file = fopen($fileName,'r');

        while( $transaction = fgetcsv($file) ){
            $transactions[] = $transaction;
        }

        return $transactions;
    }