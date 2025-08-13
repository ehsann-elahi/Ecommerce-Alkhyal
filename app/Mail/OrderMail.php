<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $order;
    public $isAdmin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user = null, $order, $isAdmin = false)
    {
        $this->user = $user;
        $this->order = $order;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->isAdmin) {
            return $this->subject('New Order Placed')
                ->view('admin.email.order')
                ->with([
                    'user' => $this->user,
                    'order' => $this->order,
                ]);
        } else {
            return $this->subject('Order Placed')
                ->view('user.email.order')
                ->with([
                    'user' => $this->user,
                    'order' => $this->order,
                ]);
        }
    }
}
