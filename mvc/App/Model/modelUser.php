<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 10.03.2020
 * Time: 0:35
 */

namespace App\Model;

class modelUser
{
    private $_id = 123;
    private $_name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->_name = $name;
    }


}