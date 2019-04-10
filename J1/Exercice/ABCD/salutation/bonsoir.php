<?php

class Bonsoir
{
    private $bsr;

    /**
     * @return mixed
     */
    public function getBsr()
    {
        $this->bsr = 'Bonsoir';
        return $this->bsr;
    }
}
