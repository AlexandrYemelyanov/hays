<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$file = __DIR__.'/tmp/test-save.txt';
$fp = fopen($file, "a+");
fwrite($fp, 'test');
fclose($fp);
echo "Test done!!";