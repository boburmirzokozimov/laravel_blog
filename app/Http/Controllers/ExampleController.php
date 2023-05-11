<?php

namespace App\Http\Controllers;

use App\Modules\User\Jobs\ProcessPayment;
use App\Modules\User\Jobs\SendWelcomeEmail;

class ExampleController
{
    public function __invoke()
    {
        foreach (range(1, 100) as $i) {
            SendWelcomeEmail::dispatch();
        }

        ProcessPayment::dispatch()->onQueue('payments');

    }
}
