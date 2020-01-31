<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $address, $subject;

    public function __construct($data, $subject)
    {
        $this->data = $data;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $address = 'road-tech@road-tech.eus';
        $subject = $this->subject;
        $name = 'Road Tech';

        return $this->view('emails.test')
            ->from($address, $name)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject)
            ->with([
                'incidencia' => $this->data['incidencia'],
                'afectado' => $this->data['afectado'],
                'coche' => $this->data['coche'],
                'link_incidencia' => $this->data['link_incidencia']
            ]);
    }
}
