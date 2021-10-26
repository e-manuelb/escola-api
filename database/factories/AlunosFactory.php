<?php

namespace Database\Factories;

use App\Models\Alunos;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alunos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'telefone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'dataDeNascimento' => $this->faker->date(),
            'genero' => 'Masculino'
        ];
    }
}
