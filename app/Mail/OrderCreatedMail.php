<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Ticket;
use App\Models\TicketPlan;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public Order $order,
        public User $user,
        public Ticket $ticket,
        public TicketPlan $ticketPlan,
    )
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.order-created');
    }
}
