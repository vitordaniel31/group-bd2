<?php

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
        $membro->codEquipe = function () {
            return Equipe::inRandomOrder()->first()->
            codigo;
        };
        $membro->codFuncionario = function () {
                return Funcionario::inRandomOrder()->first()->
            codigo;
        };

        return $membro;
    }
}