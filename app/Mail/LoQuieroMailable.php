<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoQuieroMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'título por defecto del correo de solicitud de un producto';
    public $solicitud;
    public $producto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($solicitud, $producto)
    {
        $this->subject = $solicitud['nombre'].' '.$solicitud['apellido'].' '.'solicita un producto.';
        $this->solicitud = $solicitud;
        $this->producto = $producto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.lo_quiero');
    }
}
