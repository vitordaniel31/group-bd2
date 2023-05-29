<?php

namespace App\Factories;

use Faker\Factory as FakerFactory;
use App\Models\AtividadeProjeto;
use App\Models\Atividade;
use App\Models\Projeto;

class AtividadeProjetoFactory
{
    public static function create()
    {
        $faker = FakerFactory::create();

        $projeto = Projeto::inRandomOrder()->first();

        $atividadeProjeto = $projeto->atividades()->create([
            'codAtividade' => Atividade::inRandomOrder()->first()->codigo,
            'codProjeto' => $projeto->codigo,
        ]);

        return $atividadeProjeto;
    }

    public static function createMany($quantity)
    {
        $atividadesProjetos = [];
        
        for ($i = 0; $i < $quantity; $i++) {
            $atividadesProjetos[] = self::create();
        }
        
        return $atividadesProjetos;
    }
}
