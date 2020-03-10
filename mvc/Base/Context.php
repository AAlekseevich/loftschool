<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 10.03.2020
 * Time: 1:13
 */

namespace Base;


class Context
{
    private static $_instance;

    /** @var Request */
    private $_request;
    /** @var Router */
    private $_routes;
    /** @var DB */
    private $_db;

    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function i()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->_request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void
    {
        $this->_request = $request;
    }

    /**
     * @return Router
     */
    public function getRoutes(): Router
    {
        return $this->_routes;
    }

    /**
     * @param Router $routes
     */
    public function setRoutes(Router $routes): void
    {
        $this->_routes = $routes;
    }

    /**
     * @return DB
     */
    public function getDb(): DB
    {
        return $this->_db;
    }

    /**
     * @param DB $db
     */
    public function setDb(DB $db): void
    {
        $this->_db = $db;
    }



}