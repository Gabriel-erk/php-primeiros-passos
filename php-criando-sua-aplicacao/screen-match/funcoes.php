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
