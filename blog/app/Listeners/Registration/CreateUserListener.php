<?php

namespace App\Listeners\Registration;

use App\Events\Registration;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUserListener
{


    /**
     * Handle the event.
     *
     * @param Registration $event
     * @return void
     */
    public function handle(Registration $event)
    {

        $event::$result = User::create($event->params);

    }
}
