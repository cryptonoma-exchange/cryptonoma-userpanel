<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Illuminate\Support\Facades\URL;

class DeleteAccountConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $deleteLink;
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->deleteLink = URL::temporarySignedRoute(
            'confirm_account_delete',
            now()->addMinutes(30),
            ['user' => encrypt($user->id)]
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmation of Account Deletion')->view('email.deleteAccountConfirmation');
    }
}
