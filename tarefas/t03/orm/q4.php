<?php
include('app/config/connection.php');

use App\Factories\AtividadeFactory;
use App\Factories\AtividadeMembroFactory;
use App\Factories\AtividadeProjetoFactory;
use App\Factories\DepartamentoFactory;
use App\Factories\EquipeFactory;
use App\Factories\FuncionarioFactory;
use App\Factories\MembroFactory;
use App\Factories\ProjetoFactory;

$quantidade = 500;

$gerentes = FuncionarioFactory::createMany($quantidade, true);
echo "Criei $quantidade gerentes\n";

$departamentos = DepartamentoFactory::createMany($quantidade);
echo "Criei $quantidade departamentos\n";

$funcionarios = FuncionarioFactory::createMany($quantidade);
echo "Criei $quantidade funcionarios\n";

$equipes = EquipeFactory::createMany($quantidade);
echo "Criei $quantidade equipes\n";

$membros = MembroFactory::createMany($quantidade);
echo "Criei $quantidade membros\n";

$projetos = ProjetoFactory::createMany($quantidade);
echo "Criei $quantidade projetos\n";

$atividades = AtividadeFactory::createMany($quantidade);
echo "Criei $quantidade atividades\n";

$atividadesProjetos = AtividadeProjetoFactory::createMany($quantidade);
echo "Criei $quantidade atividades de projetos\n";

$atividadesMembros = AtividadeMembroFactory::createMany($quantidade);
echo "Criei $quantidade membros de atividades\n";