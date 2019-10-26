<?php
$number = 600851475143;
$timeStart = time();

$minResult = 2;

$checkPrim = $number;

function checkPrim ($num) { //Простейшая фукнция на проверку простоты числа
    if ($num < 2)
        return false;
    if ($num == 2)
        return true;
    $lim = sqrt($num); //Определяем максимально возможный делитель, дальше которого проверка бессмысленна, если проверены все целые числа до него
    for ($i = 2; $i <= $lim; $i++) {
        if ($num % $i == 0)
            return false;
    }
    return true;
}

for ($minResult = 2; $minResult < $number / 2; $minResult++)  { //Определяем наибольший делитель числа
    if ($number % $minResult == 0) {
        $checkPrim = $number / $minResult;
        if (checkPrim($checkPrim)) //Проверяем простоту наибольшего делителя обычным перебором
            break;
    }
}



print_r($checkPrim . PHP_EOL . (time() - $timeStart));
//Ответ 6857, получен за 36 секунд