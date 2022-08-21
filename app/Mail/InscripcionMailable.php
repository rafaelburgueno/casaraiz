<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InscripcionMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'título por defecto del correo de inscripcion';
    public $inscripcion;
    public $evento;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inscripcion , $evento)
    {
        $this->subject = $inscripcion['nombre'].' '.$inscripcion['apellido'].' '.'solicita una inscripción.';
        $this->inscripcion = $inscripcion;
        $this->evento = $evento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.inscripcion');

    }
}
