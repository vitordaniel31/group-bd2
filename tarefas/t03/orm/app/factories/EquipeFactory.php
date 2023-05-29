<?php

namespace App\Factories;

use Faker\Factory as FakerFactory;
use App\Models\Equipe;

class EquipeFactory
{
    public static function create()
    {
        $faker = FakerFactory::create();

        $equipe = new Equipe();
        $equipe->nomeEquipe = $faker->word;

        $equipe->save();

        return $equipe;
    }

    public static function createMany($quantity)
    {
        $equipes = [];
        
        for ($i = 0; $i < $quantity; $i++) {
            $equipes[] = self::create();
        }
        
        return $equipes;
    }
}