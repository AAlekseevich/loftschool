<?php


namespace App\Controller;


class User extends \Base\Controller
{
    public function indexAction()
    {
        $this->_render = false;
        echo "User";
    }
}