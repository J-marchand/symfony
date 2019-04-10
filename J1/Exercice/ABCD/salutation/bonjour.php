<?php

class Bonjour
{
    private $bjr;

    /**
     * @return mixed
     */
    public function getBjr()
    {
        $this->bjr = 'bonjour';
        return $this->bjr;
    }
}
