<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Mail;

class Mailer
{
    private $sendFrom = '';
    private $sendTo = '';
    private $sendFormView = '';
    private $sendData = [];
    private $sendSubject='';

    public function __construct(string $sendFormView,array $sendData,string $sendSubject,string $sendTo = null,string $sendFrom = null)
    {
        $this->sendFrom = $sendFrom;
        $this->sendTo = $sendTo;
        $this->sendFormView = $sendFormView;
        $this->sendData = $sendData;
        $this->sendSubject = $sendSubject;
    }


    public function send()
    {
        Mail::send($this->sendFormView, ['data' => $this->sendData], function ($message)  {
            $message->from($this->sendFrom, env('APP_NAME'));

            $message->to($this->sendTo, '')->subject($this->sendSubject);
        });
    }
}
