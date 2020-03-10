<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.03.2020
 * Time: 23:34
 */

namespace App\Controller;

use App\Model\modelUser;
use Base\Context;

class Index extends \Base\Controller
{

    public function indexAction()
    {
        $user = new modelUser();
        $users = modelUser::getList([1,2]);
        $this->view->users = $users;
    }
}