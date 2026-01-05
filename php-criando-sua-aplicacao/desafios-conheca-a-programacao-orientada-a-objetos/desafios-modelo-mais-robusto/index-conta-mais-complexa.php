<?php 
require_once __DIR__ . '/Cliente.php';
require_once __DIR__ . '/ContaBancariaComplexa.php';

$cliente = new Cliente("Gabriel Erick", "588.888.341-79");
$contaBancaria = new ContaBancariaComplexa($cliente, 2000);

$contaBancaria->deposito(2000);
$contaBancaria->saque(300);
$contaBancaria->encerrarConta();
$contaBancaria->deposito(100);