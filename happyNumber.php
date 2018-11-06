<?php
/**
 * Created by PhpStorm.
 * User: brially
 * Date: 11/6/18
 * Time: 9:38 AM
 */
require_once "NumberChecker.php";

$in_number = readline("Enter Number to test:" );

try {
    if(NumberChecker::isHappy($in_number)) echo "$in_number is a happy number0\n";
    else echo "$in_number is not a happy number\n";
    exit;
}
catch (Exception $e) {
    echo 'Exception: ',  $e->getMessage(), "\n";
    exit;
}

