<?php 

require_once __DIR__ . '/ClienteDesafioChat.php';
require_once __DIR__ . '/ContaBancariaDesafioChat.php';
require_once __DIR__ . '/ContaBancariaServiceDesafioChat.php';
require_once __DIR__ . '/ContaCorrenteDesafioChat.php';
require_once __DIR__ . '/ContaPoupancaDesafioChat.php';

$contaBancariaService = new ContaBancariaServiceDesafioChat();

$clienteUm = new ClienteDesafioChat("Gabriel Não Sabe Amar Pouco", "499.823.123-23");
$contaCorrenteClienteUm = new ContaCorrenteDesafioChat($clienteUm, 23000);
// echo var_dump($contaCorrenteClienteUm);
echo $contaBancariaService->estaAtiva($contaCorrenteClienteUm) . PHP_EOL;
echo "Novo saldo: " . $contaCorrenteClienteUm->getSaldo() . PHP_EOL;
echo $contaBancariaService->depositar($contaCorrenteClienteUm, 2000) . PHP_EOL;
echo "Novo saldo: " . $contaCorrenteClienteUm->getSaldo() . PHP_EOL;
echo $contaBancariaService->sacar($contaCorrenteClienteUm, 3000) . PHP_EOL;
echo "Novo saldo: " . $contaCorrenteClienteUm->getSaldo() . PHP_EOL;

// echo var_dump($contaCorrenteClienteUm);
// se realizar o saque abaixo não vai dar pois é maior que o limite estipulado de 10k
// echo $contaBancariaService->sacar($contaCorrenteClienteUm, 22000) . PHP_EOL;
echo $contaBancariaService->sacar($contaCorrenteClienteUm, 10000) . PHP_EOL;
echo "Novo saldo: " . $contaCorrenteClienteUm->getSaldo() . PHP_EOL;
echo $contaBancariaService->sacar($contaCorrenteClienteUm, 10000) . PHP_EOL;
echo "Novo saldo: " . $contaCorrenteClienteUm->getSaldo() . PHP_EOL;
echo $contaBancariaService->sacar($contaCorrenteClienteUm, 2000) . PHP_EOL;
echo "Novo saldo: " . $contaCorrenteClienteUm->getSaldo() . PHP_EOL;
echo $contaBancariaService->desativarConta($contaCorrenteClienteUm) . PHP_EOL;
echo $contaBancariaService->estaAtiva($contaCorrenteClienteUm) . PHP_EOL;
echo $contaBancariaService->sacar($contaCorrenteClienteUm, 2000) . PHP_EOL;
