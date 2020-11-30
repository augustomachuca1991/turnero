<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paciente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dni' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'nombre' => $this->faker->name,
            'edad' => $this->faker->numberBetween($min = 10, $max = 60),
            'telefono' => $this->faker->e164PhoneNumber,
            'domicilio' => $this->faker->address,
            'ocupacion' => 'Docente',
            'estado' => $this->faker->randomElement([true, false]),
        ];
    }
}