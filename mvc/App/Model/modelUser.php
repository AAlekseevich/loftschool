<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 10.03.2020
 * Time: 0:35
 */

namespace App\Model;

use Base\Context;

class modelUser
{
    private $_id;
    private $_name;
    private $_passwordHash;
    private $_age;
    private $_description;
    private $_photo;

    public function save()
    {
        $db = Context::i()->getDb();
        $insert = $db->exec('INSERT INTO users (`name`, password, age, description, photo) VALUES (:name, :pass, :age, :description, :photo)',
            __METHOD__,
            ['name' => $this->_name, 'pass' => $this->_passwordHash, 'age' => $this->_age, 'description' => $this->_description, 'photo' => $this->_photo]);
        if (!$insert) {
            return false;
        }
        $id = $db->lastInsertId();
        $this->_id = $id;
        return true;
    }

    public function get(int $id)
    {
        $db = Context::i()->getDb();
        $data = $db->fetchOne("SELECT * FROM users WHERE id = :id",
            __METHOD__,
            ['id' => $id]);
        if ($data) {
            $this->loadData($data);
            return true;
        }
        return false;

    }

    public function loadData(array $data)
    {
        if (isset($data['id'])) {
            $this->_id = $data['id'];
        }
        $this->_name = $data['name'];
        $this->_passwordHash = $data['password'];
        $this->_age = $data['age'];
        $this->_description = $data['description'];
        $this->_photo = $data['photo'];
    }

    public static function getList(array $ids)
    {
        $db = Context::i()->getDb();
        foreach ($ids as &$id) {
            $id = (int) $id;
        }
        $idsStr = implode(',', $ids);
        $data = $db->fetchAll("SELECT * FROM users WHERE id IN($idsStr)",
            __METHOD__);
        if (!$data) {
            return [];
        }

        $res = [];
        foreach ($data as $elem) {
            $model = new self();
            $model->loadData($elem);
            $res[] = $model;
        }
        return $res;
    }

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

    /**
     * @return mixed
     */
    public function getPasswordHash()
    {
        return $this->_passwordHash;
    }

    /**
     * @param mixed $passwordHash
     */
    public function setPasswordHash($passwordHash)
    {
        $this->_passwordHash = $passwordHash;
    }

    public static function genPasswordHash(string $password)
    {
        return sha1($password . 'dfsf3l,[pv');
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->_photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->_photo = $photo;
    }

}