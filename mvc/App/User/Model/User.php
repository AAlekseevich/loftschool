<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.03.2020
 * Time: 19:17
 */

namespace App\User\Model;

use Base\Context;
use Base\DBConnection as DBConnection;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    private $id;
    private $name;
    private $password;
    private $passwordHash;
    private $age;
    private $description;
    private $photo;
    private $createdAt;
    protected $table = 'users';

    public function initDbByData(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->passwordHash = $data['password_hash'];
        $this->age = $data['age'];
        $this->description = $data['description'];
        $this->photo = $data['photo'];
        $this->createdAt = $data['created_at'];

    }

    public function initByData(array $data)
    {
        $this->name = $data['name'];
        $this->password = $data['password'];
        $this->age = $data['age'];
        $this->description = $data['description'];
        $this->photo = $data['photo'];
    }

    public function saveToDb()
    {
        $user = new User;
        $user->name = $this->name;
        $user->password = $this->genPasswordHash();
        $user->age = $this->age;
        $user->description = $this->description;
        $user->photo = $this->photo;
        $user->save();
    }

    private function genPasswordHash()
    {
        $hash = md5($this->password);
        return $hash;
    }
}