<?php

namespace App\Listeners;

use Mail;
use App\Mail\NotifyNewCompanyMail;

class NewCompanyHasCreatedListener
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user->email)->send(new NotifyNewCompanyMail());
    }
}
