<?php 

echo "Bem-vindo(a) ao Screen Match!" . PHP_EOL;
// inicializando minhas váriaveis, antes de usa-las de fato
$notas = [];
$somaNotas = 0;

for ($i=0; count($notas) < 5; $i++) { 
    // readline para ler a nota do usuário digitada no terminal
    $nota = readline("Digite a nota " . ($i+1) . " para o filme: ");
    $notas[$i] = $nota;
    $somaNotas += $notas[$i];
}

$mediaNotas = $somaNotas / count($notas);

$nomeFilme = "Top Gun - Maverick";
$anoLancamento = 2022;
$notaFilme = 9.5;
$incluidoNoPlano = true;

echo "Filme: $nomeFilme - ($anoLancamento) - Nota: $mediaNotas" . PHP_EOL; 

?>