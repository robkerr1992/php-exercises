<?php

require_once 'model.php';

class User extends Model
{
    protected static $table = 'users';
}

echo User::getTableName() . PHP_EOL;