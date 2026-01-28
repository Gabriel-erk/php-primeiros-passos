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

// criando 3 cliente
$clienteUm = new ClienteTb("Gabriel Erick", "984.123.834-97");
$clienteDois = new ClienteTb("Pierre Orno", "123.984.756-98");
$clienteTres = new ClienteTb("Mike Swentchzel", "563.423.245-56");

// criando uma conta de cada tipo
$contaCorrente = new ContaCorrenteTb($clienteUm, 30000);
$contaPoupanca = new ContaPoupancaTb($clienteDois, 20000);
$contaSalario = new ContaSalario($clienteTres, 25000);

var_dump($contas);

// foreach ($contas as $conta) {
//     $conta->sacar();
// }
