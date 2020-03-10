<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.03.2020
 * Time: 23:34
 */

namespace App\Controller;

class Index extends \Base\Controller
{

    public function indexAction()
    {
        $this->view->userModel = new \App\Model\modelUser();
    }
}