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
echo "=== Depósitos simples === \n";
echo $service->depositar($contaCorrente, 5000);
echo $service->depositar($contaPoupanca, 1000);

echo "\n";

echo "=== Saques simples === \n";
echo $service->sacar($contaCorrente, 5000);
echo $service->sacar($contaPoupanca, 1000);

echo "\n";
echo "=== Depósitos com valores negativos === \n";
// valor negativo
echo $service->depositar($contaCorrente, -5);
echo $service->depositar($contaPoupanca, -10);

echo "\n";
echo "=== Saques Incorretos (conta corrente) === \n";
// valor negativo
echo $service->sacar($contaCorrente, -1);
// valor que não está em conta
echo $service->sacar($contaCorrente, 1000000);

echo "\n";
echo "=== Transferências simples === \n";
// corrente - poupanca
echo $service->transferir($contaCorrente, $contaPoupanca, 1000);
// poupanca - corrente 
echo $service->transferir($contaPoupanca, $contaCorrente, 3000);

echo "\n";
echo "=== Transferências inválidas === \n";
// valor negativo
echo $service->transferir($contaCorrente, $contaPoupanca, -1);
// valor maior que o saldo
echo $service->transferir($contaCorrente, $contaPoupanca, 1000000);


echo "\n";
echo "=== Esvaziamento de conta e desativação === \n";
while ($contaCorrente->getSaldo() > 0) {
    $service->sacar()
}

// echo "Id da conta \n";
// echo $contaCorrente->getId() . "\n";
// echo $contaPoupanca->getId() . "\n";
// $service->listarContas();