<?php

if (!function_exists('mysql_connect')) {
    echo "Function mysql_connect not exists!\n";
}

require_once __DIR__ . '/../vendor/autoload.php';

if (function_exists('mysql_connect')) {
    echo "Function mysql_connect now exists!\n";
}