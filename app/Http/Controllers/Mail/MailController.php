<?php

namespace App\Http\Controllers\Mail;

use App\Helpers\Mailer;
use App\Http\Requests\MailRequest;
use App\Repository\RequestsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    private  $requestRepository;
    public function __construct(RequestsRepository $requestsRepository)
    {
        $this->requestRepository = $requestsRepository;
    }

    public function send(MailRequest $request)
    {
        $dataRequest = $request->all();
        $sendData = [];
        if($request->has('name')) {
            $sendData['Имя:'] = $request->get('name');
        }
        if($request->has('phone')) {
            $sendData['Телефон:'] = $request->get('phone');
        }
        if($request->has('message')) {
            $sendData['Сообщение:'] = $request->get('message');
        }
        $this->requestRepository->create([
            'name'=>$request->get('name'),
            'phone'=>$request->get('phone'),
            'message'=>$request->get('message')
        ]);

        $mailer = new Mailer('mail.index',$sendData,'Форма обратной связи',getSettingData('feedback.emails'),env('MAIL_USERNAME'));
        $mailer->send();
    }
}
