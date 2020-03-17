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
use Base\Session;
use Intervention\Image\ImageManager as Image;

class User extends ControllerAbstract
{
    private $imagePath;



    public function loginAction()
    {
        $this->tpl = 'login.phtml';
        if($_POST) {
            $name = $this->p('login');
            $password = $this->p('password');
            $password = $this->genPasswordHash($password);

            $user = new userModel();
            try {
                $success = $user->authorize($name, $password);
                if (!$success) {
                    $error = 'Wrong login or password';
                }
            } catch (Exception $e) {
                $error = 'Sever error';
                trigger_error($e->getMessage());
                $success = false;
            }

            if ($success) {
                $this->redirect('/');
            } else {
                $this->view->error = $error;
                $this->tpl = 'register.phtml';
            }
        }
    }

    public function registerAction()
    {
        $this->tpl = 'register.phtml';
        if($_POST) {
            $tmpPhoto = $_FILES['photo']['tmp_name'];
            $namePhoto = $_FILES['photo']['name'];

            $this->imagePath = $_SERVER['DOCUMENT_ROOT'] . '/images/';
            $manager = new Image(array('driver' => 'gd'));
            $image = $manager->make($tmpPhoto)->save($this->imagePath . $namePhoto);
            $photo = '/images/' . $namePhoto;

            $data = [
                'name' => $_POST['login'],
                'password' => $this->genPasswordHash($_POST['password']),
                'age' => $_POST['age'],
                'description' => $_POST['description'],
                'photo' => $photo
            ];

            $user = new userModel();
            $user->saveToDb($data);
            $this->redirect('/');
        }
    }

    public function fillAction()
    {
        $user = new userModel();
        $user->fakerSave();
        $this->redirect('/');
    }

    public function logoutAction()
    {
        Session::destroy();
        $this->redirect('/');
    }

    private function genPasswordHash($password)
    {
        $hash = md5($password);
        return $hash;
    }
}