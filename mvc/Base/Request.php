<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 10.03.2020
 * Time: 1:14
 */

namespace Base;


class Request
{
    private $_controllerName = '';
    private $_actionName = '';

    public function __construct()
    {
        $parts = explode('/', $_SERVER['REQUEST_URI']);
        $this->_controllerName = $parts[1] ?? '';
        $this->_actionName = $parts[2] ?? '';
    }

    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->_controllerName;
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        return $this->_actionName;
    }

}