<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.03.2020
 * Time: 19:11
 */

namespace Base;
use App\User\Model\User as modelUser;


class ControllerAbstract
{
    public $tpl;
    public $view;

    /** @var modelUser $user */
    protected $user;

    public function __construct()
    {
        /** @var Router $routes */
        $routes = Context::getInstance()->getRouters();
        $this->tpl = strtolower($routes->getActionName()) . '.phtml';
    }

    /**
     * @param modelUser $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    protected function redirect(string $location)
    {
        throw new RedirectException($location, 0);
    }

    public function p(string $key)
    {
        return htmlspecialchars($_REQUEST[$key] ?? '');
    }
}