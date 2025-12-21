<?php 

echo "Bem-vindo(a) ao Screen Match!" . PHP_EOL;
$nomeFilme = "Top Gun - Maverick";
// argv é um array especial do php que guarda os argumentos passados via linha de comando (TERMINAL), separados por espaço, ou seja, ao digitar "php screen-match.php 2022", o valor 2022 estará em $argv[1] e o valor $argv[0] será o nome do arquivo "screen-match.php"
$anoLancamento = $argv[1] ?? 2022; // se não for passado nenhum argumento (ou seja, se for nulo), o ano de lançamento será 2022
$notaFilme = (9 + 10 + 9 + 8 + 10) / 5;

$planoPrime = true;
// se uma das condições forem verdadeiras, a váriavel $incluidoNoPlano será verdadeira (true), caso contrário, será falsa (false)
$incluidoNoPlano = $planoPrime || $anoLancamento < 2020;

echo $nomeFilme . PHP_EOL;
echo "Lançado em: ($anoLancamento) - Nota: $notaFilme" . PHP_EOL;

?>