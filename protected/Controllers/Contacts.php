<?php

namespace App\Controllers;

use T4\Core\Exception;
use T4\Mail\Sender;
use T4\Mvc\Controller;

/**
 * Class Contacts
 * @package App\Controllers
 *
 * @TODO отсылать сообщения
 */
class Contacts
    extends Controller
{

    public function access($action)
    {
        if ($this->app->user->isBlocked == '1') {
            return false;
        }
        return true;
    }
    
    public function actionDefault($mail = null)
    {
        if ($mail) {
            if ($mail->human !== 'on') {
                throw new Exception('Dude, you\'re a robot!');
            }
            $sender = new Sender();
            $sender->sendMail('stupidgranny@yandex.ru', $mail->name, 'Category: ' . $mail->category . '<br>Message: ' . $mail->message . '<br>Email: ' . $mail->email);
            $this->redirect('/');
        }
    }
}