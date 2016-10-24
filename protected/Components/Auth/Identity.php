<?php

namespace App\Components\Auth;

use App\Models\Item;
use App\Models\User;
use App\Models\UserSession;
use T4\Http\Helpers;

class Identity
{
    public function getUser()
    {
        if(!empty(Helpers::issetCookie('foffaAuth'))) {
            if (!empty($hash = Helpers::getCookie('foffaAuth'))) {
                if (!empty($session = UserSession::findByHash($hash))) {
                    return $session->user;
                }
            }
        }
        return null;
    }
    
    public function login($data)
    {
        $errors = new MultiException();

        if(empty($data->email)) {
            $errors->add( new Exception('We need to know your email, bruh!'));
        }

        if(empty($data->password)) {
            $errors->add( new Exception('We need to know your password, mate!'));
        }

        if(!$errors->isEmpty()) {
            throw $errors;
        }

        $user = User::findByEmail($data->email);

        if(empty($user)) {
            $errors->add( new Exception('We don\'t know a user with such a cool email. Do you want to register?'));
            throw $errors;
        }

        if(!password_verify($data->password, $user->password)) {
            $errors->add( new Exception('Wow! Wrong password! Don\'t ya hacker?'));
        }

        $hash = sha1(microtime() . mt_rand());
        $session = new UserSession();
        $session->hash = $hash;
        $session->user = $user;
        $session->save();

        Helpers::setCookie('foffaAuth', $hash, time()+30*24*60*60);
    }
    
    static public function logout()
    {
        Helpers::unsetCookie('foffaAuth');
    }

    public function register($data)
    {
        $newMember = new User();
        $newMember->fill($data);
        $newMember->password = password_hash($newMember->password, PASSWORD_DEFAULT);
        $newMember->save();
        if(!empty($data->__item_id)) {
            $item = Item::findByPK($data->__item_id);
            $newMember->items->add($item);
            $newMember->save();
        }
    }
}