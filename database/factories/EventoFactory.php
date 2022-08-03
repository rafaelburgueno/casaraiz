<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $nombre = $this->faker->words(rand(2,8), true);
        //$nombre = $this->faker->sentence();
        $responsable = $this->faker->name();
        $fecha = $this->faker->dateTimeBetween('now', '+1 year');
        $anio = $fecha->format('Y');
        $mes = $fecha->format('m');
        $dia = $fecha->format('d');
        $dia_de_semana = $fecha->format('l');
        //$hora = $fecha->format('H:i');

        return [
            
            'slug' => Str::slug($nombre, '-'),
            'nombre' => $nombre,
            'tipo' => $this->faker->randomElement(['taller', 'curso', 'conferencia', 'evento', 'fiesta']),
            'user_id' =>$this->faker->numberBetween(1,10),
            'responsable' =>$responsable,
            'descripcion' =>$this->faker->paragraph(),
            //'categoria' =>$this->faker->randomElement(['Espiritualidad', 'Niños', 'Adultos' , 'Adultos mayores', 'Arte', 'Cine', 'Danza', 'Deportes', 'Fotografia', 'Literatura', 'Musica', 'Teatro']),
            'lugar' =>$this->faker->randomElement(['Salón', 'Patio', 'Vereda', 'Auditorio', 'Rambla']),
            //'activo' =>$this->faker->,
            //'en_agenda' =>$this->faker->,
            'fecha' =>$fecha,
            'hora_de_inicio' =>rand(9,18).':00',
            'hora_de_fin' =>rand(18,23).':00',
            'dia_de_semana' =>$this->faker->randomElement(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo']),
            'dia' =>$dia,
            'mes' =>$this->faker->randomElement(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']),
            'anio' =>$anio,
            'cupos_totales' =>$this->faker->randomElement(['10', '15', '20', '25', '30', '35', '40', '45', '50', '60', '70', '80', '90', '100']),
            //'cupos_disponibles' =>$this->faker->,
            'relevancia' =>rand(0,9),
            'costo_de_inscripcion' =>$this->faker->randomElement(['100', '150', '200', '250', '300', '350', '400', '450', '500', '600', '700', '800', '900', '1000', '1100', '1200', '1300', '1400', '1500', '1600', '1700', '1800', '1900', '2000', '2100', '2200', '2300', '2400', '2500']),
            'frecuencia_semanal' => $this->faker->boolean(),
            'frecuencia_mensual' => $this->faker->boolean(),
            'frecuencia_anual' => $this->faker->boolean(),

        ];
    }
}
