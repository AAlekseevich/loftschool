<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.03.2020
 * Time: 21:57
 */

namespace Base;

use Throwable;

class RedirectException extends \Exception
{
    private $_location;

    public function __construct(string $message, int $code, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->_location = $message;
    }

    public function getLocation()
    {
        return $this->_location;
    }
}