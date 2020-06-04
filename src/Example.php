<?php
namespace App;

class Example
{
    public function clear($string, $separator = '-', $maxLength = 96)
    {
        $title = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);
        $title = preg_replace('%[^-/+|\w ]%', '', $title);
        $title = strtolower(trim(substr($title, 0, $maxLength), '-'));
        $title = preg_replace('/[\/_|+ -]+/', $separator, $title);

        return $title;
    }

    public function contains(string $value)
    {

    }

    public function peek()
    {

    }

    public function push(string $value)
    {

    }

    public function pop()
    {

    }

    public function isEmpty()
    {

    }
}