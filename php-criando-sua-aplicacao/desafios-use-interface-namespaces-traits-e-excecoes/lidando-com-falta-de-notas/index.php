<?php 

require_once 'autoload.php';
use FaltaNotas\Model\{ClienteTc, ContaCorrenteTc, ContaPoupancaTc};
use FaltaNotas\Services\BancoServiceTc;

$clienteUm = new ClienteTc("Gabriel Erick", "999.444.333-98");
$clienteDois = new ClienteTc("Lucas Vicente", "983.415.123-09");

$service = new BancoServiceTc();
$contaCorrente = new ContaCorrenteTc($clienteUm, 35000);
echo $service->criarConta($contaCorrente);