<?php

namespace App\Factories;

use Faker\Factory as FakerFactory;
use App\Models\Membro;
use App\Models\Equipe;
use App\Models\Funcionario;

class MembroFactory
{
    public static function create()
    {
        $faker = FakerFactory::create();

        $membro = new Membro();
        $membro->codEquipe = Equipe::inRandomOrder()->first()->codigo;
        $membro->codFuncionario = Funcionario::inRandomOrder()->first()->codigo;

        $membro->save();

        return $membro;
    }

    public static function createMany($quantity)
    {
        $membros = [];
        
        for ($i = 0; $i < $quantity; $i++) {
            $membros[] = self::create();
        }
        
        return $membros;
    }
}