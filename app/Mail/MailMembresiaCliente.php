<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailMembresiaCliente extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'título por defecto del correo de inscripcion';
    public $inscripcion;
    public $membresia = 'unknown';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inscripcion)
    {
        $this->subject = $inscripcion['nombre'].' '.'gracias por solicitar una membresía en Casa Raíz.';
        $this->inscripcion = $inscripcion;
        if($inscripcion['inscripcionable_id'] == 1){
            $this->membresia = 'Semilla';
        }elseif($inscripcion['inscripcionable_id'] == 2){
            $this->membresia = 'Raíz';
        }elseif($inscripcion['inscripcionable_id'] == 3){
            $this->membresia = 'Árbol';
        }
        

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.membresia_cliente');
    }
}
