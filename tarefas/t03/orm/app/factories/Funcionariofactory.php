<?php

namespace App\Factories;

use Faker\Factory as FakerFactory;
use App\Models\Funcionario;
use App\Models\Departamento;

class FuncionarioFactory
{
    public static function create(bool $gerente = false)
    {
        $faker = FakerFactory::create();

        $funcionario = new Funcionario();
        $funcionario->nome = $faker->name;
        $funcionario->sexo = $faker->randomElement(['M', 'F']);
        $funcionario->dataNasc = $faker->date();
        $funcionario->salario = $faker->randomFloat(2, 1000, 5000);

        if ($gerente) {
            $funcionario->supervisor = null;
            $funcionario->depto = null;
        } else {
            $funcionario->supervisor = Funcionario::inRandomOrder()->first()->codigo;
            $funcionario->depto = Departamento::inRandomOrder()->first()->codigo;
        }

        $funcionario->save();

        return $funcionario;
    }

    public static function createMany(int $quantity, bool $gerente = false)
    {
        $funcionarios = [];
        
        for ($i = 0; $i < $quantity; $i++) {
            $funcionarios[] = self::create($gerente);
        }
        
        return $funcionarios;
    }
}