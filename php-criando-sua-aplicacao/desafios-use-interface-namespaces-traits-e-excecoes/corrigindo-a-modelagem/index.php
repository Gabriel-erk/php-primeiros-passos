<?php 

require_once __DIR__ . '/ClienteTa.php';
require_once __DIR__ . '/ContaBancariaTa.php';
require_once __DIR__ . '/TipoContaTa.php';
require_once __DIR__ . '/ContaCorrenteTa.php';
require_once __DIR__ . '/ContaPoupancaTa.php';
require_once __DIR__ . '/ContaBancariaServiceTa.php';

$cliente = new ClienteTa("Gabriel Erick", "897.088.087-98");
// aqui quando realizar o saque vai descontar uma taxa de 400
$contaCorrente = new ContaCorrenteTa($cliente, 14000);
$contaPoupanca = new ContaPoupancaTa($cliente, 23000);
$contaBancariaService = new ContaBancariaServiceTa(); 

echo "==== ATIVAÇÃO INICIAL ====" . PHP_EOL;
echo "Status 1: " . $contaBancariaService->status($contaCorrente) . PHP_EOL;
echo "Status 2: " . $contaBancariaService->status($contaPoupanca) . PHP_EOL;

echo "==== DEPÓSITOS VÁLIDOS ====" . PHP_EOL;
echo $contaBancariaService->depositar($contaCorrente, 400);
