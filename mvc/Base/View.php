<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.03.2020
 * Time: 23:48
 */
namespace Base;

class View
{
    protected $_data;

    public function __set($name, $value)
    {
        $this->_data[$name] = $value;
    }

    public function __get($name)
    {
        if (isset($this->_data[$name])) {
            return $this->_data[$name];
        }
        return '';
    }

    public function render(string $tpl)
    {
        ob_start();
        include $tpl;
        echo ob_get_clean();
    }
}