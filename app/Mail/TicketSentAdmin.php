<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class TicketSentAdmin extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

     /**
     * The contact instance.
     *
     * @var Contact
     */
    protected $ticket_id;
    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket, $ticketChat)
    {
        $this->ticket_id = $ticket;
        $this->message = $ticketChat;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::where('id', \Auth::id())->first();
        return $this->markdown('email.ticket-sent-admin')
                    ->with([
                        'username' => $user->name,
                        'userEmail' => $user->email,
                        'reference_no' => $this->ticket_id,
                        'message' => $this->message,                       
                        'signature' => '<p>Regards</p>Tokash Team'
                    ]);
    }
}
