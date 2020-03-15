<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 14.03.2020
 * Time: 19:14
 */

namespace App\User\Controller;


use Base\ControllerAbstract;
use App\User\Model\User as userModel;
use Intervention\Image\ImageManager as Image;

class User extends ControllerAbstract
{
    private $imagePath;



    public function loginAction()
    {
        $this->tpl = 'login.phtml';
        $name = $this->p('login');
        var_dump($name);
    }

    public function registerAction()
    {
        $this->tpl = 'register.phtml';
        if($_POST) {
            $name = $this->p('login');
            $password = $this->p('password');
            $age = $this->p('age');
            $description = $this->p('description');
            $tmpPhoto = $_FILES['photo']['tmp_name'];
            $namePhoto = $_FILES['photo']['name'];

            $this->imagePath = $_SERVER['DOCUMENT_ROOT'] . '/images/';
            $manager = new Image(array('driver' => 'gd'));
            $image = $manager->make($tmpPhoto)->save($this->imagePath . $namePhoto);
            $photo = $_SERVER['HTTP_HOST'] . '/images/' . $namePhoto;

            $user1 = new userModel();
            $user1->initByData([
                'name' => $name,
                'password' => $password,
                'age' => $age,
                'description' => $description,
                'photo' => $photo,
            ]);
            $user1->saveToDb();
        }
    }
}