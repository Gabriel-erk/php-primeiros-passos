<?php

require_once __DIR__ . '/ClienteTb.php';
require_once __DIR__ . '/OperacoesBancariasTb.php';
require_once __DIR__ . '/ValidacaoFinanceiraTb.php';
require_once __DIR__ . '/TipoContaTb.php';
require_once __DIR__ . '/ContaBancariaTb.php';
require_once __DIR__ . '/ContaBancariaServiceTb.php';
require_once __DIR__ . '/ContaCorrenteTb.php';
require_once __DIR__ . '/ContaPoupancaTb.php';
require_once __DIR__ . '/ContaSalarioTb.php';

$contaBancariaServiceTb = new ContaBancariaServiceTb();

// criando 3 cliente
$clienteUm = new ClienteTb("Gabriel Erick", "984.123.834-97");
$clienteDois = new ClienteTb("Pierre Orno", "123.984.756-98");
$clienteTres = new ClienteTb("Mike Swentchzel", "563.423.245-56");

// criando uma conta de cada tipo e colocando todas em um array (não sei colocar em um array do tipo "ContaBancariaTb" então deixei sem tipagem mesmo)
$contas = [
    $contaCorrente = new ContaCorrenteTb($clienteUm, 30000),
    $contaPoupanca = new ContaPoupancaTb($clienteDois, 20000),
    $contaSalario = new ContaSalario($clienteTres, 25000)
];

var_dump($contas);

// percorrendo com foreach e chamando sacar(500) em todas
foreach ($contas as $conta) {
    echo $contaBancariaServiceTb->sacar($conta, 500) . PHP_EOL;
    echo $contaBancariaServiceTb->verSaldo($conta) . PHP_EOL;
}

echo "\n";

echo "--- TESTES DEPÓSITO ---" . PHP_EOL;
// depósito funciona em conta corrente, poupança e salário, pois quando é conta salário faço uso do polimorfismo para sobrescrever o método depositar, obrigado a usar outro (depositarSalario, como voce havia pedido), não sei se foi a abordagem correta, mas tentei
foreach ($contas as $conta) {
    echo $contaBancariaServiceTb->depositar($conta, 500) . PHP_EOL;
    echo $contaBancariaServiceTb->verSaldo($conta) . PHP_EOL;
    echo "\n";
}

echo "--- TESTES SAQUE ---" . PHP_EOL;

