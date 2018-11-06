<?php
/**
 * Created by PhpStorm.
 * User: brially
 * Date: 11/5/18
 * Time: 3:29 PM
 */

class NumberChecker
{
    /**
     * The number that the code will resolve the input number down to proving it is happy.
     * @var int
     */
    private static $happyBaseNumber = 1;

    /**
     * The number that the code will resolve the input number down to proving it is not happy.
     * This number enables the exiting of an infinate loop.
     * @var int
     */
    private static $notHappyBaseNumber = 4;

    /**
     * The factor by which each didgit in the input number will be raised by.
     * @var int
     */
    private static $powerFactor = 2;

    /**
     * Testing to see if the input number is greater than 0
     * @param $number
     * @return bool
     */
    private static function isPositive($number){
        return $number > 0;
    }

    /**
     * Testing to see if the input number does not contain a fraction.
     * @param $number
     * @return bool
     */
    private static function isWhole($number){
        return $number % 1 === 0 ;
    }

    /**
     * Testing an input number that it can be resolved to meet the happy criteria.
     * @param $number
     * @return bool
     * @throws Exception
     */
    public static function isHappy($number){
        if(is_numeric($number) && self::isPositive($number) && self::isWhole($number)) {
            if($number === self::$notHappyBaseNumber) return false;
            if($number === self::$happyBaseNumber) return true;
            $digits = str_split($number);
            foreach ($digits as $k => $digit) $digits[$k] = $digit ** self::$powerFactor;
            return self::isHappy(array_sum($digits));
        }
        else {
            throw new Exception("Invalid input exception. A positive whole number is required.");
        }
    }

}