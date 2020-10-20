<?php

namespace App\Listeners\Registration;

use App\Events\Registration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ConfigureUserListener
{
    /**
     * Handle the event.
     *
     * @param  Registration  $event
     * @return void
     */
    public function handle(Registration $event)
    {
        $event->params['password'] = bcrypt($event->params['password']);
        $event->params['is_admin'] = false;
    }
}
