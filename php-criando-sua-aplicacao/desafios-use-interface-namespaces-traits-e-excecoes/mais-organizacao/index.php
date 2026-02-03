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
// testando regras em comum de cada conta

// 1 - sacar valor igual a zero
foreach ($contas as $conta) {
    echo $contaBancariaServiceTb->sacar($conta, 0) . PHP_EOL;
    echo $contaBancariaServiceTb->saldo($conta) . PHP_EOL;
}

echo "\n";

// 2 - valor maior que o saldo em conta
foreach ($contas as $conta) {
    // armazenando um valor maior que o saldo para tentar saca-lo em cada conta
    $valorMaiorQueSaldo = $contaBancariaServiceTb->saldo($conta) + 1;
    echo $contaBancariaServiceTb->sacar($conta, $valorMaiorQueSaldo) . PHP_EOL;
    echo $contaBancariaServiceTb->saldo($conta) . PHP_EOL;
}

echo "\n";

// echo $contaBancariaServiceTb->sacar($contaCorrente, 10000) . PHP_EOL;
// echo $contaBancariaServiceTb->saldo($contaCorrente) . PHP_EOL;
// echo $contaBancariaServiceTb->sacar($contaCorrente, 10000) . PHP_EOL;
// echo $contaBancariaServiceTb->saldo($contaCorrente) . PHP_EOL;
// echo $contaBancariaServiceTb->sacar($contaCorrente, 5910.1875) . PHP_EOL;
// echo $contaBancariaServiceTb->saldo($contaCorrente) . PHP_EOL;

// echo $contaBancariaServiceTb->verSaldo($contaPoupanca) . PHP_EOL;
// echo $contaBancariaServiceTb->verSaldo($contaSalario) . PHP_EOL;
// 3 - saque com conta inativa (sim, vai ter msg pra cacete)
foreach ($contas as $conta) {
    if ($conta->tipoConta == TipoContaTb::Corrente) {
        // coloquei como maior que um pois tava indo pra uns tipos de 0 muito loucos
        while ($contaBancariaServiceTb->saldo($conta) > 0) {
            if ($contaBancariaServiceTb->saldo($conta) > 10000) {
                echo $contaBancariaServiceTb->sacar($conta, 10000) . PHP_EOL;
                echo number_format($contaBancariaServiceTb->saldo($conta), 2, ',', '.') . PHP_EOL;
            } else {
                $saldoContaCorrente = $contaBancariaServiceTb->saldo($conta);
                $taxa_saque_conta_corrente = $contaBancariaServiceTb->saldo($conta) * 0.05;
                $saldoAremoverContaCorrente = $saldoContaCorrente - $taxa_saque_conta_corrente;
                echo $contaBancariaServiceTb->sacar($conta, $saldoAremoverContaCorrente) . PHP_EOL;
                echo $contaBancariaServiceTb->saldo($conta) . PHP_EOL;
            }
        }
    } else {
        $saldoAtual = $contaBancariaServiceTb->saldo($conta);
        var_dump($saldoAtual);
        echo $contaBancariaServiceTb->sacar($conta, $saldoAtual), PHP_EOL;
        echo $contaBancariaServiceTb->verSaldo($conta) . PHP_EOL;
    }
}

// var_dump($contas);