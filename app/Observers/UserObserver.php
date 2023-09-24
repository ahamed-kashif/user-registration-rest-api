<?php

namespace App\Observers;

use App\Mail\NewUserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * when user is stored in database for the first time
     * @param User $user
     * @return void
     */
    public function created(User $user): void
    {
        Log::info('Sending email invitation to '. $user->email);
        Mail::to($user->email)->queue(new NewUserRegistered($user));
    }
}
