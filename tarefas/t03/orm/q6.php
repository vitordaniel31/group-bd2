<?php
include('app/config/connection.php');
include('q5.php');
include('q7.php');

echo "Rodando a questão 5\n";
questao5();
deletarIndices();
echo "\n\n";

echo "Rodando a questão 5 com indices da questão 7\n";
questao7();
questao5();
echo "\n\n";



