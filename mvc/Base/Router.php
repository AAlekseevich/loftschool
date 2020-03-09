<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 10.03.2020
 * Time: 1:13
 */

namespace Base;


class Router
{
    const DEF_CONTROLLER = 'Index';
    const DEF_ACTION = 'index';

    private $_controllerName = '';
    private $_actionName = '';

    public function makeRoute()
    {
        $request = Context::i()->getRequest();

        $controllerName = $request->getControllerName();
        $actionName = $request->getActionName();

        if (!$controllerName || !$this->check($controllerName)) {
            $this->_controllerName = self::DEF_CONTROLLER;
        } else {
            $this->_controllerName = ucfirst(strtolower($controllerName));
        }

        if (!$actionName || $this->check($actionName)) {
            $this->_actionName = self::DEF_ACTION;
        } else {
            $this->_actionName = strtolower($actionName);
        }
    }

    private function check(string $key)
    {
        return preg_match('/[a-zA-Z0-9]+/', $key);
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