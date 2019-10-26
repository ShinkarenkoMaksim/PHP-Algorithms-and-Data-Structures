<?php
$string = "pwwkew";
$result = ["substr" => "", "count" => 0];

function strSub(String $string)
{
    $stringOut = "";
    for ($i = 0; $i < strlen($string); $i++) {
        if (strpos($stringOut, substr($string, $i, 1)) === false)
            $stringOut .= substr($string, $i, 1);
        else
            break;
    }
    return ["substr" => $stringOut, "count" => strlen($stringOut)];
}

for ($j = 0; $j < (strlen($string) - $result["count"]); $j++) {
    $answer = strSub(substr($string, $j));
    if ($answer["count"] > $result["count"]) {
        $result = $answer;
    }
}

print_r($result["count"]);
