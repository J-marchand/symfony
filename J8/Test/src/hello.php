<?php
namespace App;
use App\service;


class hello
{
    public $age;
    public $service;
    public $locale;

    public function __construct($age, service $service, $locale)
    {
        $this->age = $age;
        $this->service = $service;
        $this->locale = $locale;
    }


    public function hello()
    {

    }
}