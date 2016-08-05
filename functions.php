<?php
function inputHas($key)
{
    if (isset($_REQUEST["$key"])) {
        return true;
    } else {
        return false;
    };

};

function inputGet($key)
{

    if (isset($_REQUEST["$key"])) {
        return $_REQUEST["$key"];
    } else {
        return null;
    };


};

function escape($key)
{
    htmlspecialchars(strip_tags($key));
    return $key;

};