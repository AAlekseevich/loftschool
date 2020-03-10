<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 10.03.2020
 * Time: 1:13
 */

namespace Base;

use Base\Exception\Error404;

class Application
{
    /** @var Context */
    private $_context;

    protected function init() {
        $this->_context = Context::i();
        $request = new Request();
        $routes = new Router();
        $db = new DB();

        $this->_context->setRequest($request);
        $this->_context->setRoutes($routes);
        $this->_context->setDb($db);
    }

    public function run() {
        try {
            $this->init();
            $this->_context->getRoutes()->makeRoute();
            $routes = $this->_context->getRoutes();

            $controllerFileName = 'App\Controller\\' . $routes->getControllerName();
            if (!class_exists($controllerFileName)) {
                throw new Error404('Class ' . $controllerFileName . ' not exists');
            }

            /** @var Controller $controllerObj */
            $controllerObj = new $controllerFileName();

            $actionFuncName = $routes->getActionName();
            var_dump($actionFuncName);
            if (!method_exists($controllerObj, $actionFuncName)) {
                throw new Error404('Action ' . $actionFuncName . ' not exists');
            }

            $tpl = '../App/Templates/' . $routes->getControllerName() . '/' . $routes->getActionToken() . '.phtml';

            $view = new \Base\View();
            $controllerObj->view = $view;
            $controllerObj->$actionFuncName();
            if ($controllerObj->isRender()) {
                $html = $view->render($tpl);
                echo $html;
            }
            var_dump($controllerObj);
        } catch (\Error404 $e) {
            header('HTTP/1.0 404 Not Found');
            trigger_error($e->getMessage());
        }
    }
}