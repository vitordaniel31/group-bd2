<?php

use Faker\Factory as FakerFactory;
use App\Models\Departamento;
use App\Models\Funcionario;

class DepartamentoFactory
{
    public static function create()
    {
        $faker = FakerFactory::create();

        $departamento = new Departamento();
        $departamento->sigla = $faker->unique()->word;
        $departamento->descricao = $faker->sentence;
        $departamento->gerente =
        function () {
            return Funcionario::inRandomOrder()->first()->codigo;
        };

        return $departamento;
    }
}
