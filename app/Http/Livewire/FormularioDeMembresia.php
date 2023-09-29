<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\Inscripcion;

class FormularioDeMembresia extends Component
{

    public $nombre;
    //public $apellido;
    public $correo;
    
    public $documento;
    public $telefono;
    public $tipo_de_membresia;
    public $medio_de_pago;
    public $recibir_novedades;
    public $password;
    public $password_confirmation;

    public $abilitar_boton_de_pago = false;
    public $ver_boton_de_guardar = true;

    public $respuesta = '';
    

    

    protected function rules()
    {
        return [
            'nombre' => 'required',
            //'apellido' => 'required|max:100',
            'correo' => 'required|email',
            
            'documento' => 'required|numeric|min:7',
            'telefono' => 'required|numeric|min:8',

            'tipo_de_membresia' => 'required',
            'medio_de_pago' => 'required',
            
            //'password' => 'required|same:password_confirmacion',
            //'password' => 'nullable|min:8|confirmed',
            //'photo' => 'nullable|image|max:2048',
        ];
    }

    public function mount()
    {
        //$this->abilitar_boton_de_pago = false;
        //$this->usuario = User::find(auth()->id());
        /*$usuario = Auth::user();


        $this->usuario = $usuario;
        $this->nombre = 'rafa';
        $this->email = 'rafa@rafa.com';
        $this->fecha_de_nacimiento = '10';
        $this->ingredientes_que_no_consumo = 'ajo';
        //$this->photo = $usuario->profile_photo_path;*/
        //$this->gravatar = Gravatar::get(Auth::user()->email, ['size' => 100]);
    }
 





    public function guardar()
    {
        $this->validate();

        $user = NULL;
        if(auth()){
            $user = auth()->id();
        }

        /*
        <a href="https://www.mercadopago.com.uy/checkout/v1/redirect?preference-id=494115728-9d1b8abd-2b74-4165-9970-e3064403e1dd" target="_blank" class="btn btn-tarjetas">pagar online $700</a>
        <a href="https://mpago.la/2BxmWzt" target="_blank" class="btn btn-tarjetas">pagar online $1100</a>
        <a href="https://mpago.la/1kS2hxW" target="_blank" class="btn btn-tarjetas">pagar online $2000</a>
        */

        $membresia = NULL;
        /*$semilla = env('LINK_DE_PAGO_SEMILLA','https://www.mercadopago.com.uy/checkout/v1/redirect?preference-id=494115728-9d1b8abd-2b74-4165-9970-e3064403e1dd');
        $raiz = env('LINK_DE_PAGO_RAIZ','https://mpago.la/2BxmWzt');
        $arbol = env('LINK_DE_PAGO_ARBOL','https://mpago.la/1kS2hxW');*/
        $semilla = env('LINK_DE_PAGO_SEMILLA');
        $raiz = env('LINK_DE_PAGO_RAIZ');
        $arbol = env('LINK_DE_PAGO_ARBOL');
        $link_al_pago = '';

        if($this->tipo_de_membresia == 'semilla'){
            $membresia = 1;
            $link_al_pago = $semilla;
        }elseif($this->tipo_de_membresia == 'raiz'){
            $membresia = 2;
            $link_al_pago = $raiz;
        }elseif($this->tipo_de_membresia == 'arbol'){
            $membresia = 3;
            $link_al_pago = $arbol;
        }

        $recibir_novedades = false;
        if($this->recibir_novedades == '1'){$recibir_novedades = true;}

        //si el usuario escribe un password, revisa que coincida con la confirmacion
        /*if($this->password != '' && $this->password == $this->password_confirmation){
            $this->usuario->update([
                'password' => Hash::make($this->password),
            ]);
        }*/



        // se crea el objeto Inscripcion y se almacena en la BD
        Inscripcion::create([
            'user_id' => $user,
            //'nombre' => $this->nombre.' '.$this->apellido,
            'nombre' => $this->nombre,
            'correo' => $this->correo,
            'documento_de_identidad' => $this->documento,
            'telefono' => $this->telefono,
            'inscripcionable_id' => $membresia,
            'inscripcionable_type' => 'membresia',
            'medio_de_pago' => $this->medio_de_pago,
            //'intereses' => $intereses,
            'comentario' => 'El pago esta sin confirmar',
            'recibir_novedades' => $recibir_novedades,
        ]);

        $this->ver_boton_de_guardar = false;


        if($this->medio_de_pago == 'mercadopago'){
            $this->abilitar_boton_de_pago = true;
            $this->respuesta = '<div class="my-3 text-success"><a href="'. $link_al_pago .'" target="_blank" class="btn btn-lg btn-tarjetas">Hace click acá para pagar online</a></div>';
            
            session()->flash('exito', 'La solicitud de membresía fue enviada correctamente, solo falta realizar el pago ;P');
        }else{
            session()->flash('exito', 'La solicitud de membresía fue enviada correctamente, en breve nos pondremos en contacto ;P');

        }

        //$correo = new ContactoMailable($request->all());

        // la direccion de email hay que cambiarla por casaraizuy@gmail.com al momento definalizar el proyecto
        //Mail::to('casaraizuy@gmail.com')->send($correo);
        //Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->send($correo);

        //return $request->all();


        
        //$this->respuesta = '<div class="my-3 text-success"><strong>La solicitud de membresía fue enviada correctamente.</strong></div>';
    
        
    }


       



    public function render()
    {
        return view('livewire.formulario-de-membresia');
    }
}
