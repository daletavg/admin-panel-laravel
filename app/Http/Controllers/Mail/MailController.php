<?php

namespace App\Http\Controllers\Mail;

use App\Helpers\Mailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $dataRequest = $request->all();
        $sendData = [];
        $sendData['Имя:'] = $dataRequest['name'];
        $sendData['Телефон:'] = $dataRequest['phone'];
        if(array_key_exists('e-mail',$dataRequest)) {
            $sendData['Email:'] = $dataRequest['e-mail'];
        }

        $mailer = new Mailer('mail.index',$sendData,'Форма обратной связи',getSettingData('contacts.feedback'),env('MAIL_USERNAME'));
        $mailer->send();
    }
}
