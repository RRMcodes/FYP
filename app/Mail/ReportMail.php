<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($report, $patient,$test)
    {
        $this->report = $report;
        $this->patient = $patient;
        $this->test = $test;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Report Mail',
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
        $pdfPath = public_path('reports' . DIRECTORY_SEPARATOR . $this->report->file);
//        $pdfContent = base64_encode(file_get_contents($pdfPath));

        return $this->subject('Report Alert')
            ->markdown('email.reportEmail')
            ->with([
                'report' => $this->report,
                'patient' => $this->patient,
                'test' => $this->test,
            ])
            ->attach($pdfPath,[
                'mime' => 'application/pdf'
            ]);
//            ->attachData(base64_decode($pdfContent), 'appointment.pdf', [
//                'mime' => 'application/pdf',
//            ]);
    }


}
