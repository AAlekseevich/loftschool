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
    private $_actionToken = '';

    protected function getRoutes()
    {
        return [
          'Login' => [
              'index' => 'User.login'
          ],
          'Register' => [
              'index' => 'User.register'
          ],
        ];
    }

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
            $this->_actionToken = self::DEF_ACTION;
        } else {
            $this->_actionToken = strtolower($actionName);
        }

        $routes = $this->getRoutes();
        if (isset($routes[$this->_controllerName]) && isset($routes[$this->_controllerName][$this->_actionToken])) {
            list($this->_controllerName, $this->_actionToken) = explode('.', $routes[$this->_controllerName][$this->_actionToken]);
        }

        if ($this->_controllerName == 'Login' && $this->_actionToken == 'index') {
            $this->_controllerName = 'User';
            $this->_actionToken = 'login';
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
        return $this->_actionToken . 'Action';
    }

    /**
     * @return string
     */
    public function getActionToken(): string
    {
        return $this->_actionToken;
    }


}