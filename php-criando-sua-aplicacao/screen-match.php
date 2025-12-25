<?php
// subrotina que não retorna nada, apenas exibe uma mensagem na tela, por isso o tipo de retorno é void (vazio) que significa a ausência de retorno de qualquer tipo
function exibeMensagemLancamento(int $ano): void
{
    if ($ano > 2022) {
        echo "Esse filme é um lançamento.";
    } elseif ($ano > 2020 and $ano <= 2022) {
        echo "Esse filme ainda é novo." . PHP_EOL;
    } else {
        echo "Esse filme não é um lançamento." . PHP_EOL;
    }
}

// definindo a função incluidoNoPlano que recebe dois parâmetros: um booleano $planoPrime e um inteiro $anoLancamento para facilitar o tratamento da lógica de inclusão no plano e não permitir que valores diferentes desses tipos sejam passados para a função, caso passe, o php irá avisar um erro de tipo de váriavel (ou em alguns casos, ele pode tentar converter o valor passado para o tipo esperado, mas isso não é garantido)
// fazendo isso adicionamos robustez ao código, protegendo contra erros humanos, pois eu, ou alguém que esteja mexendo no código, pode acabar passando um valor errado para a função, como uma string ou um array, o que poderia causar comportamentos inesperados ou erros em tempo de execução
// para melhorar mais ainda, podemos definir o tipo de retorno da função como booleano, utilizando ": bool" após os parênteses dos parâmetros, assim garantimos que a função sempre retornará um valor booleano (true ou false), caso contrário, o PHP irá avisar um erro de tipo de retorno
function incluidoNoPlano(bool $planoPrime, int $anoLancamento): bool
{
    // return quer dizer: devolva o resultado dessa expressão para quem te chamou, lá abaixo eu chamo essa função na váriavel $incluido no plano, e ela irá me retornar o resultado da operação lógica utilizando os valores que eu passar como argumentos para a função
    return $planoPrime || $anoLancamento < 2020;
}

echo "Bem-vindo(a) ao Screen Match!" . PHP_EOL;
$escolhaDoUsuario = (int) readline("Digite o número do filme (0 a 2): ");

while ($escolhaDoUsuario < 0 || $escolhaDoUsuario > 2) {
    echo "Número inválido. Digite novamente." . PHP_EOL;
    $escolhaDoUsuario = (int) readline("Digite o número do filme (0 a 2): ");
}
// $filmes = ["Se beber, não case!", "Thor: Ragnarok", "Top Gun - Maverick"];

$filmes =
    [
        [
            "nome" => "Se beber, não case!",
            "anoLancamento" => 2011,
        ],
        [
            "nome" => "Thor: Ragnarok",
            "anoLancamento" => 2017,
        ],
        [
            "nome" => "Top Gun - Maverick",
            "anoLancamento" => 2022,
        ]
    ];

// argv é um array especial do php que guarda os argumentos passados via linha de comando (TERMINAL), separados por espaço, ou seja, ao digitar "php screen-match.php 2022", o valor 2022 estará em $argv[1] e o valor $argv[0] será o nome do arquivo "screen-match.php"
$anoLancamento = $filmes[$escolhaDoUsuario]["anoLancamento"]; // se não for passado nenhum argumento (ou seja, se for nulo), o ano de lançamento será 2022 ex: $filmes[$escolhaDoUsuario]["anoLancamento"] ?? 2022;

$quantidadeDeNotas = $argc - 1; // o valor de argc é a quantidade de argumentos passados via linha de comando (TERMINAL), incluindo o nome do arquivo, por isso subtraímos 1 para obter a quantidade real de notas (para não incluir o nome do arquivo na contagem)
$notas = [];

for ($i = 1; $i < $argc; $i++) {
    // utilizando a cionversão de tipo (type casting) para garantir que o valor seja tratado como float, pois estava me retornando string
    // notas[], sem indicar o indice que quero armazenar, pois o PHP automaticamente atribui o próximo índice disponível no array (nesse caso, o índice 0, depois o 1, e assim por diante, vai jogando pra ultima posição disponível do array)
    $notas[] = (float) $argv[$i];
}

$notaFilme = array_sum($notas) / $quantidadeDeNotas;

$planoPrime = true;
// se uma das condições forem verdadeiras, a váriavel $incluidoNoPlano será verdadeira (true), caso contrário, será falsa (false)
$incluidoNoPlano = incluidoNoPlano($planoPrime, $anoLancamento);

echo $filmes[$escolhaDoUsuario]["nome"] . PHP_EOL;
echo "Lançado em: " . $anoLancamento . " - Nota: $notaFilme" . PHP_EOL;

exibeMensagemLancamento($anoLancamento);

// match realiza uma comparação estrita (===) entre o valor da variável e os valores definidos em cada case, caso encontre um valor correspondente, ou seja, caso o valor passado como parâemetro seja igual a um dos valores definidos, o bloco de código correspondente será executado(se $nomeFilme passado nos parênteses de match for igual a um dos cases dele, como por exemplo, um dos cases dentro do bloco de código do nosso match é "Se beber, não case!" e se o valor de $nomeFilme for igual a "Se beber, não case!" ele vai retornar o valor "comédia" para a váriavel $genero), retornando o valor associado a esse case. Se nenhum valor corresponder, o bloco default será executado, retornando o valor associado a ele.
$genero =  match ($filmes[$escolhaDoUsuario]["nome"]) {
    "Se beber, não case!" => "Comédia",
    "Thor: Ragnarok" => "super-herói",
    "Top Gun - Maverick" => "Ação",
    default => "Desconhecido"
};

echo "O gênero do filme é: $genero" . PHP_EOL;
