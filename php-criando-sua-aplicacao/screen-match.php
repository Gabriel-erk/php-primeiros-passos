<?php

echo "Bem-vindo(a) ao Screen Match!" . PHP_EOL;
$nomeFilme = "Se beber, não case!";
$nomeFilme = "Thor: Ragnarok";
$nomeFilme = "Top Gun - Maverick";
// argv é um array especial do php que guarda os argumentos passados via linha de comando (TERMINAL), separados por espaço, ou seja, ao digitar "php screen-match.php 2022", o valor 2022 estará em $argv[1] e o valor $argv[0] será o nome do arquivo "screen-match.php"
$anoLancamento = $argv[1] ?? 2022; // se não for passado nenhum argumento (ou seja, se for nulo), o ano de lançamento será 2022
$notaFilme = (9 + 10 + 9 + 8 + 10) / 5;

$planoPrime = true;
// se uma das condições forem verdadeiras, a váriavel $incluidoNoPlano será verdadeira (true), caso contrário, será falsa (false)
$incluidoNoPlano = $planoPrime || $anoLancamento < 2020;

echo $nomeFilme . PHP_EOL;
echo "Lançado em: ($anoLancamento) - Nota: $notaFilme" . PHP_EOL;

if ($anoLancamento > 2022) {
    echo "Esse filme é um lançamento.";
} elseif ($anoLancamento > 2020 and $anoLancamento <= 2022) {
    echo "Esse filme ainda é novo." . PHP_EOL;
} else {
    echo "Esse filme não é um lançamento." . PHP_EOL;
}

// match realiza uma comparação estrita (===) entre o valor da variável e os valores definidos em cada case, caso encontre um valor correspondente, ou seja, caso o valor passado como parâemetro seja igual a um dos valores definidos, o bloco de código correspondente será executado(se $nomeFilme passado nos parênteses de match for igual a um dos cases dele, como por exemplo, um dos cases dentro do bloco de código do nosso match é "Se beber, não case!" e se o valor de $nomeFilme for igual a "Se beber, não case!" ele vai retornar o valor "comédia" para a váriavel $genero), retornando o valor associado a esse case. Se nenhum valor corresponder, o bloco default será executado, retornando o valor associado a ele.
$genero =  match ($nomeFilme) {
     "Se beber, não case!" => "Comédia",
     "Thor: Ragnarok" => "super-herói",
     "Top Gun - Maverick" => "Ação",
     default => "Desconhecido"
};

echo "O gênero do filme é: $genero" . PHP_EOL;