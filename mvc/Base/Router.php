<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 14.03.2020
 * Time: 17:07
 */

namespace Base;


class Router
{
    const DEFAULT_MODULE = 'Main';
    const DEFAULT_CONTROLLER = 'Main';
    const DEFAULT_ACTION = 'Main';

    /** @var Request */
    private $request;

    private $moduleName;
    private $controllerName;
    private $actionName;

    public function __construct()
    {
        $this->request = Context::getInstance()->getRequest();
    }

    public function router()
    {
        $requestModule = $this->request->getRequestModule();
        $requestController = $this->request->getRequestController();
        $requestAction = $this->request->getRequestAction();

        $module = $requestModule ? ucfirst(strtolower($requestModule)) : false;
        $controller = $requestModule ? ucfirst(strtolower($requestController)) : false;
        $action = $requestAction ? strtolower($requestAction) : false;

        $this->moduleName = $module;
        $this->controllerName = $controller;
        $this->actionName = $action;
    }

    public function getRoutes()
    {
        return [
            'main' => 'main.main.main',
            'login' => 'user.user.login',
            'register' => 'user.user.register',
            'logout' => 'user.user.logout',
            'file' => 'file.file.main',
            'fill' => 'user.user.fill'
        ];
    }

    private function processRoutes()
    {
        $routes = $this->getRoutes();
        $module = strtolower($this->moduleName);
        $foundRoute = false;

        if (isset($routes[$module]) && is_string($routes[$module]) && empty($this->controllerName)) {
            $foundRoute = $routes[$module];
        } elseif (isset($routes[$module]) && is_array($routes[$module]) && isset($routes[$module][strtolower($this->_controllerName)]) && empty($this->_actionName)) {
            $foundRoute = $routes[$module][strtolower($this->_controllerName)];
        }

        if ($foundRoute) {
            list($newModule, $newController, $newAction) = explode('.', $foundRoute);
            $this->moduleName = $newModule;
            $this->controllerName = $newController;
            $this->actionName = $newAction;
        }

    }

    public function getController()
    {
        $this->processRoutes();

        $this->moduleName = $this->moduleName ?: self::DEFAULT_MODULE;
        $this->controllerName = $this->controllerName ?: self::DEFAULT_CONTROLLER;
        $this->actionName = $this->actionName ?: self::DEFAULT_ACTION;

        $controllerClassName = 'App\\' . $this->moduleName . '\Controller\\' . $this->controllerName;
        if (!class_exists($controllerClassName)) {
            throw new \Exception('Controller ' . $controllerClassName . ' not found');
        }

        $controller = new $controllerClassName();

        return $controller;
    }

    /**
     * @return mixed
     */
    public function getModuleName()
    {
        return $this->moduleName;
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }



}