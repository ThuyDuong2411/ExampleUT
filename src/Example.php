<?php
namespace App;

class Example
{
    public function clear($array)
    {
        unset($array);
        return empty($array) ? true : false;
    }

    public function contains($array, $value)
    {
        return array_search($value, $array) ? true : false;
    }

    public function peek($array)
    {
        return end($array);
    }

    public function push($array, $value)
    {
        array_push($array, $value);
        return $array;
    }

    public function pop($array)
    {
        array_pop($array);
        return $array;
    }

    public function isEmpty($array)
    {
        return empty($array) ? true:false;
    }
}