<?php

namespace App\Core\User\Listeners;

use App\Core\User\Events\UserRegister;
use Illuminate\Contracts\Mail\Mailer;
use App\Mail\UserRegister as UserRegisterMail;

class UserChange
{
    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param  UserRegister  $event
     *
     * @return void
     */
    public function handleRegister(UserRegister $event)
    {
        $this->mailer
            ->to($event->user)
            ->queue((new UserRegisterMail())->onQueue('mails'));
    }
}
