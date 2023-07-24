<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($patientName,$specialist,$doctorName,$dayOfWeek,$appointment_date,$from, $to)
    {
        $this->patientName = $patientName;
        $this->specialist = $specialist;
        $this->doctorName = $doctorName;
        $this->dayOfWeek = $dayOfWeek;
        $this->appointment_date = $appointment_date ;
        $this->fromTime = $from ;
        $this->toTime = $to;

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Appointment email',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    public function build()
    {
        return $this->subject('Appointment Schedule')
            ->markdown('email.appointmentEmail')
            ->with([
                'patientName'   =>  $this->patientName,
                'specialist' => $this->specialist,
                'doctorName' => $this->doctorName,
                'dayOfWeek' => $this->dayOfWeek,
                'appointment_date'  => $this->appointment_date,
                'fromTime'  => $this->fromTime,
                'toTime' => $this->toTime,
            ])
            ;
    }


}
