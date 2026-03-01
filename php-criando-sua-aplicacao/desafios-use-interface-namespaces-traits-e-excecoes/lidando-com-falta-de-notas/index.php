<?php 

require_once 'autoload.php';
use FaltaNotas\Model\{ClienteTc, ContaCorrenteTc, ContaPoupancaTc};
use FaltaNotas\Services\BancoServiceTc;

// criar 2 clientes
$clienteUm = new ClienteTc("Gabriel Erick", "999.444.333-98");
$clienteDois = new ClienteTc("Cristiano", "983.415.123-09");

$service = new BancoServiceTc();

// criar conta corrente e poupança
$contaCorrente = new ContaCorrenteTc($clienteUm, 35000);
echo $service->criarConta($contaCorrente);
$contaPoupanca = new ContaPoupancaTc($clienteDois, 25000);
echo $service->criarConta($contaPoupanca);

/* 
* depósitos
*/
echo "=== Depósitos === \n";
echo $service->depositar($contaCorrente, 5000);
echo $service->depositar($contaPoupanca, 1000);

echo "\n";

echo "=== Saques simples === \n";
echo $service->sacar($contaCorrente, 5000);
echo $service->sacar($contaPoupanca, 1000);

echo "Id da conta";
echo $contaCorrente->getId() . "\n";
echo $contaPoupanca->getId() . "\n";