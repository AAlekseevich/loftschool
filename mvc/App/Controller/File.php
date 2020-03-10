<?php


namespace App\Controller;


class File extends \Base\Controller
{
    public function indexAction()
    {
        $this->_render = false;
        echo 'File';
    }
}