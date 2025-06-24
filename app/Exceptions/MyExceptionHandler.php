<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Throwable;

class MyExceptionHandler extends ExceptionHandler
{
    // ...

    public function report(Throwable $exception)
    {
        if ($this->shouldReport($exception)) {
            // Send an email notification
            if ($this->shouldSendEmail($exception)) {
                $this->sendEmail($exception);
            }

            // Log the exception
            Log::error($exception);
        }
    }

    // ...

    protected function shouldSendEmail(Throwable $exception)
    {
        // You can implement your logic here to determine if an email should be sent
        return true;
    }

    protected function sendEmail(Throwable $exception)
    {
        // Send an email using Laravel's built-in Mail class
        Mail::to('akash.dutta@icagroup.in')->send(new ExceptionNotification($exception));
    }
}
