<?php namespace Cbix;

use Exception;

class ToshiException extends Exception
{
    /**
     * @internal param $e
     * @return string
     */
    public function error()
    {
        return $this->getMessage();
    }
}