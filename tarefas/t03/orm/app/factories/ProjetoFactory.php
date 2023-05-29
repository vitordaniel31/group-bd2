<?php

namespace App\Factories;

use Faker\Factory as FakerFactory;
use App\Models\Projeto;
use App\Models\Equipe;
use App\Models\Departamento;
use App\Models\Funcionario;

class ProjetoFactory
{
    public static function create()
    {
        $faker = FakerFactory::create();

        $projeto = new Projeto();
        $projeto->descricao = $faker->sentence(5);
        $projeto->depto = Departamento::inRandomOrder()->first()->codigo;
        $projeto->dataInicio = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d');
        $projeto->dataFim = $faker->dateTimeBetween($projeto->dataInicio, '+1 year')->format('Y-m-d');
        $projeto->situacao = $faker->randomElement(['Em andamento', 'Concluído', 'Cancelado']);
        $projeto->dataConclusao = ($projeto->situacao == 'Concluído') ? $faker->dateTimeBetween($projeto->dataInicio, $projeto->dataFim)->format('Y-m-d') : null;
        $projeto->equipe = Equipe::inRandomOrder()->first()->codigo;
        $projeto->responsavel = Funcionario::inRandomOrder()->first()->codigo;

        $projeto->save();

        return $projeto;
    }

    public static function createMany($quantity)
    {
        $projetos = [];
        
        for ($i = 0; $i < $quantity; $i++) {
            $projetos[] = self::create();
        }
        
        return $projetos;
    }
}