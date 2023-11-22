<?php
$file1 = strtolower(file_get_contents('file1.txt'));
$file2 = strtolower(file_get_contents('file2.txt'));

echo "The Number of occurrences of word {$_GET['str']} in file1 : ".substr_count($file1,strtolower($_GET['str']))."<br>";
echo "Number of occurrences of word {$_GET['str']} in file2 : ".substr_count($file2,strtolower($_GET['str']));