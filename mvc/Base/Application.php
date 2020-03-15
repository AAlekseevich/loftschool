<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 14.03.2020
 * Time: 16:48
 */

namespace Base;

use \Base\Model\Factory as Factory;
use \Base\View as View;

class Application
{
    private $config;
    /**
     * @var Context
     */
    private $context;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var Router
     */
    private $routers;

    /** @var DBConnection */
    private $db;


    public function init()
    {
        $this->context = Context::getInstance();

        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        $this->db = new DBConnection();
        $this->context->setDbConnection($this->db);

        $this->request = new Request();
        $this->context->setRequest( $this->request );

        //$this->initUser();
    }

//    private function initUser() {
//        $session = Session::instance;
//        $userId = $session->getUserId();
//        if ($userId) {
//            if ($session->check()) {
//                $user = Factory::getById(FACTORY::MODEL_USER, $userId) {
//                    if ($user) {
//                        $this->context->setUser($user);
//                }
//                }
//            }
//        }
//    }

    public function run()
    {
        try {
            $this->init();

            $this->request->handle();

            $this->routers = new Router();
            $this->context->setRouters($this->routers);
            $this->routers->router();

            $controller = $this->routers->getController();

            $action = strtolower($this->routers->getActionName()) . 'Action';

            if (!method_exists($controller, $action)) {
                throw new \Exception('Action ' . $action . ' not found is controller ' . $this->routers->getControllerName());
            }


            $view = new View($this->getDefaultTemplatePath());

            $controller->view = $view;

            $user = Context::getInstance()->getUser();
            if ($user) {
                $controller->setUser(User);
            }

            $controller->$action();

            if ($controller) {
                $content = $view->render($controller->tpl);
                echo $content;
            }
//        } catch (RedirectException $e) {
//            header('Location: ' . $e->getLocation());
//        } catch (\Exception $e) {
//            $e->process();
        } catch (\Exception $e) {
            echo 'Произошло исключение: ' . $e->getMessage();
        }

    }

    private function getDefaultTemplatePath()
    {
        return ucfirst('\..\App\\' . $this->routers->getModuleName()) . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR;
    }
}