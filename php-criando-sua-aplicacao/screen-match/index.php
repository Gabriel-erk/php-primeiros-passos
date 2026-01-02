<?php 
require_once __DIR__ . "/src/Model/Filme.php";

echo "Bem-vindo(a) ao ScreenMatch" . PHP_EOL;
// objeto da classe filme
$filme = new Filme();

$filme->nome = "Jogo do Bicho";
$filme->anoLancamento = 2020;
$filme->genero = "Ação";

$filme->avalia(10);
$filme->avalia(3);
$filme->avalia(5);
$filme->avalia(5);

var_dump($filme);
echo $filme->media() . PHP_EOL;


