<?php


namespace Base;


class Controller
{
    public $view;

    protected $_render = true;

    protected $_jsonData = [];

    public function preAction()
    {
    }

    /**
     * @return bool
     */
    public function isRender(): bool
    {
        return $this->_render;
    }

    public function json()
    {
        header('Content-type: application/json');
        echo json_encode($this->_jsonData);
    }


}