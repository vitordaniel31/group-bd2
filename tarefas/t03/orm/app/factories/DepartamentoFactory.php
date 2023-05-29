<?php

namespace App\Factories;

use Faker\Factory as FakerFactory;
use App\Models\Departamento;
use App\Models\Funcionario;

class DepartamentoFactory
{
    public static function create()
    {
        $faker = FakerFactory::create();

        $departamento = new Departamento();
        $departamento->sigla = $faker->unique()->lexify('?????');
        $departamento->descricao = $faker->sentence;
        $departamento->gerente = Funcionario::inRandomOrder()->first()->codigo;

        $departamento->save();

        return $departamento;
    }

    public static function createMany($quantity)
    {
        $departamentos = [];
        
        for ($i = 0; $i < $quantity; $i++) {
            $departamentos[] = self::create();
        }
        
        return $departamentos;
    }
}
