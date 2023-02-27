<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PropuestaMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'título por defecto del correo';
    public $propuesta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($propuesta)
    {
        $this->subject = $propuesta['nombre'].' completo el formulario de emprendedores.';
        $this->propuesta = $propuesta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.propuesta');
    }
}
