<?php

namespace App\Mail;

use App\Attendance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendenceCanceled extends Mailable
{
    use Queueable, SerializesModels;

    public $attendance;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Attendance $attendance)
    {
        $this->attendance = $attendance;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Consulta cancelada')
        ->view('emails.attendance.canceled');
    }
}
