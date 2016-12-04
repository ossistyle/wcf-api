<?php
namespace Via;

function getValueFromArrayKey($key, $array)
{
    if (isset($array[$key])) {
        return $array[$key];
    }
    return null;
}