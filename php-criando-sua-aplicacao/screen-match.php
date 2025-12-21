<?php 

echo "Bem-vindo(a) ao Screen Match!" . PHP_EOL;
$nomeFilme = "Top Gun - Maverick";
$anoLancamento = 2022;
$notaFilme = (9 + 10 + 9 + 8 + 10) / 5;

$planoPrime = true;
// se uma das condições forem verdadeiras, a váriavel $incluidoNoPlano será verdadeira (true), caso contrário, será falsa (false)
$incluidoNoPlano = $planoPrime || $anoLancamento < 2020;

echo $nomeFilme;

?>