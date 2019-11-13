<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // env('mail_username) -> to zkonfigurowany mail z ktorego wysylamy maila
        // subject to tytul maila
        // view to wyglad tresci naszej wiadomosci
        // with data to nasza tresc wiadomosci
        return $this->from(env('MAIL_USERNAME'))->subject('New message from laravel')->view('dynamic_email_template')->with('data', $this->data);
    }
}
