<?php

namespace App\Factories;

use Faker\Factory as FakerFactory;
use App\Models\AtividadeMembro;
use App\Models\Atividade;
use App\Models\Projeto;
use App\Models\Membro;

class AtividadeMembroFactory
{
    public static function create()
    {
        $faker = FakerFactory::create();

        $atividade = Atividade::inRandomOrder()->first();

        $atividadeMembro = $atividade->membros()->create([
            'codMembro' => Membro::inRandomOrder()->first()->codigo,
        ]);

        $atividadeMembro->save();

        return $atividadeMembro;
    }

    public static function createMany($quantity)
    {
        $atividadesMembros = [];
        
        for ($i = 0; $i < $quantity; $i++) {
            $atividadesMembros[] = self::create();
        }
        
        return $atividadesMembros;
    }
}
