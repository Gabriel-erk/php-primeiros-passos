<?php
function sacar(array $conta, float $valor_a_sacar) : array
{
    if ($conta['Saldo'] < $valor_a_sacar) {
        echo "Você não pode sacar, valor insuficiente." . PHP_EOL;
    } else {
        $conta['Saldo'] -= $valor_a_sacar;
    }
    return $conta;
}

// especificando que o valor do primeiro parâmetro é array
// especificando que o valor do parâmetro que vai guardar o depósito tem que ser do tipo float, fazendo com que o erro seja mostrado nessa linha no terminal ao tentar passar outro argumento - valores inteiros são aceitos aqui também (mais explicações na tabela de conversões na doc do php) porém o contrário não funcionaria
// após os : específico o tipo do retorno da minha função
function depositar(array $conta, float $valor_a_depositar) : array
{
    if ($valor_a_depositar > 0) {
        $conta['Saldo'] += $valor_a_depositar;
    } else {
        echo "Digite um valor válido para saque." . PHP_EOL;
    }

    /* retornando a conta ao invés do valor (nesse caso retornando todas as chaves, saldo, titular....) - caso não retorne nada, o a linha: $contasCorrentes['123.241.453.83'] = depositar($contasCorrentes['123.241.453.83'], -70); retornará nulo, pois a chave com esse cpf recebera um valor nulo, já que nada foi retornado para ela */
    return $conta;
}

$contasCorrentes = [
    '123.445.123-98' => [
        'Titular' => 'Hylander Comédia',
        'Saldo' => 100
    ],

    '123.433.451-93' => [
        'Titular' => 'Marco Dos Anjos',
        'Saldo' => 300
    ],

    '123.241.453.83' => [
        'Titular' => 'Fulano de tal',
        'Saldo' => 500
    ]
];

// dizendo que a chave '123.241.453.83' vai receber o retorno da função sacar, ela que recebe a conta '123.241.453.83' como parâmetro e o valor 500 para sacar - onde a função irá
$contasCorrentes['123.241.453.83'] = sacar($contasCorrentes['123.241.453.83'], 500);

// retornando pra minha conta outra conta onde o depósito foi realizado com sucesso
$contasCorrentes['123.241.453.83'] = depositar($contasCorrentes['123.241.453.83'], 20);

foreach ($contasCorrentes as $cpf => $conta) {
    /* 
    * intituladas de string complexas, não por serem complexas, mas por nos permitirem utilizar dados complexos em strings, sem precisar ficar concatenando (vulgo interpolação), podemos chamar um array associativo em uma string, com essa interpolação, onde apenas envolveremos o "dado complexo" entre chaves
    * outra forma de fazer isso, seria assim "$cpf $conta[titular] $conta [Saldo]" que também daria certo, onde você remove os aspas das chaves 'titular' e 'saldo', é uma forma também, maas, eu prefiro usar da forma com {} mesmo pois permite maior organização e padronização do código, pelo menos pra mim ficaria mais legível
    */
    echo "$cpf {$conta['Titular']} {$conta['Saldo']}" . PHP_EOL;
}