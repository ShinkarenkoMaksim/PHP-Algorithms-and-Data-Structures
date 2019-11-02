<?php
$word = 'asdffdsa';

function checkPalindrome (String $word) {
    $len = strlen($word);
    if ($len <= 1)
        return "Палиндром";
    if (substr($word, -1) == $word{0})
        return checkPalindrome(substr($word, 1, -1));
    return "Не палиндром";
}

print_r(checkPalindrome($word));