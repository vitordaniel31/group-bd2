<?php
use Faker\Factory as FakerFactory;
use App\Models\Funcionario;

class FuncionarioFactory
{
    public static function create()
    {
        $faker = FakerFactory::create();

        $funcionario = new Funcionario();
        $funcionario->nome = $faker->name;
        $funcionario->sexo = $faker->randomElement(['M', 'F']);
        $funcionario->dataNasc = $faker->date();
        $funcionario->salario = $faker->randomFloat(2, 1000, 5000);
        $funcionario->supervisor = function () {
            return Funcionario::inRandomOrder()->first()->codigo;
        };
        $funcionario->depto = null;

        return $funcionario;
    }
}