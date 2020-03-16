<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.03.2020
 * Time: 19:17
 */

namespace App\User\Model;

use Base\Context;
use Base\Session as Session;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'password', 'age', 'description', 'photo'];

    public function authorize($name, $password)
    {
        $user = User::where('name', '=' ,$name)->first();
        if ($user->password == $password) {
            $session = Session::instance();
            $session->save((int)$user->id);
            return true;
        }
        return false;
    }

    public function saveToDb($data)
    {
        User::firstOrCreate($data);
    }

    public function getById($id)
    {
        return User::find($id);
    }

    public function getAllUsers()
    {
        return User::all();
    }
}