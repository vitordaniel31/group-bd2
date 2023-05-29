<?php

use Faker\Factory as FakerFactory;
use App\Models\Equipe;

class EquipeFactory
{
    public static function create()
    {
        $faker = FakerFactory::create();

        $equipe = new Equipe();
        $equipe->nomeEquipe = $faker->word;

        return $equipe;
    }
}