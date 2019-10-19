<?php

$suffix = urldecode($_SERVER['REQUEST_URI']);
$host = $_SERVER['HTTP_HOST'];

$prefUrl = substr($suffix, 1);
$parentUrl = strtok($suffix, "/");

$pathStart = "C:/Program Files/"; //Здесь указываем стартовый путь

$path  = $pathStart . $suffix;

$dir = new DirectoryIterator($path);
$parentUrl = str_replace($pathStart, "", $dir->getPathname());

echo "<a href=\"http://{$host}{$parentUrl}/..\">..</a><br>";
foreach ($dir as $item) {
    if ($item->isDir()) {
        if ($item == '.' || $item == '..') continue;
        echo "<a href=\"http://{$host}/{$prefUrl}/{$item->getFilename()}\">{$item->getFilename()}</a><br>";
        //Я так и не понял, почему иногда $host включает слеш, а иногда не включает. Поэтому слеши в ссылке "копятся"...
    }
    else
        echo $item . "<br>";
}

