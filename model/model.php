<?php

class Model
{
    private $data = [];

    /**
     * @return array
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;

    }
    public function __get($name)
    {
        if(array_key_exists($name, $this->data)) {
            return $this->data[$name];

        }
        return null;

    }
}

$model = new Model();

$model->name = 'Blake';
$model->age = 46;
$model->gender = 'M';

echo $model->name . PHP_EOL;
echo $model->age . PHP_EOL;
echo $model->gender . PHP_EOL;