<?php

namespace App\Factories;

use Faker\Factory as FakerFactory;
use App\Models\Atividade;

class AtividadeFactory
{
    public static function create()
    {
        $faker = FakerFactory::create();

        $atividade = new Atividade();
        $atividade->descricao = $faker->sentence(5);
        $atividade->dataInicio = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d');
        $atividade->dataFim = $faker->dateTimeBetween($atividade->dataInicio, '+1 year')->format('Y-m-d');
        $atividade->situacao = $faker->randomElement(['Em andamento', 'Concluído', 'Cancelado']);
        $atividade->dataConclusao = ($atividade->situacao == 'Concluído') ? $faker->dateTimeBetween($atividade->dataInicio, $atividade->dataFim)->format('Y-m-d') : null;

        $atividade->save();

        return $atividade;
    }

    public static function createMany($quantity)
    {
        $atividades = [];
        
        for ($i = 0; $i < $quantity; $i++) {
            $atividades[] = self::create();
        }
        
        return $atividades;
    }
}
