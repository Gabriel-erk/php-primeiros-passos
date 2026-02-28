<?php

namespace FaltaNotas\Service;

use FaltaNotas\Model\ContaBancariaTc;

class BancoServiceTc
{
    private array $contas;
    /** @var ContaBancariaTc */
    // comentário acima indica pra IDE que a propriedade $contas vai ter apenas objetos do tipo ContaBancariaTc

    public function criarConta(ContaBancariaTc $conta): void {}

    public function depositar(ContaBancariaTc $conta, float $valor): string
    {
        if ($conta->depositar($valor)) {
            return "Depósito de: $valor realizado com sucesso na conta " . $conta->getTipo() . " do cliente " . $conta->getCliente() . "\n";
        } else {
            return "Tentativa de depósito não efetuada na conta " . $conta->getTipo() . " do cliente " . $conta->getCliente() . "\n";
        }
    }

    public function sacar(ContaBancariaTc $conta, float $valor): string
    {
        if ($conta->sacar($valor)) {
            return "Saque de: $valor realizado com sucesso na conta " . $conta->getTipo() . " do cliente " . $conta->getCliente() . "\n";
        } else {
            return "Tentativa de saque não efetuada na conta " . $conta->getTipo() . " do cliente " . $conta->getCliente() . "\n";
        }
    }

    public function transferir(ContaBancariaTc $contaOrigem, ContaBancariaTc $contaDestino, float $valor): string
    {
        if (
            $contaOrigem->sacar($valor) &&
            $contaDestino->depositar($valor)
        ) {
            return "Transferência de: $valor realizada com sucesso de conta " . $contaOrigem->getTipo() . " para conta " . $contaDestino->getTipo() . "\n";
        } else {
            return "Tentativa de transferência de valores entre contas fracassada.\n";
        }
    }

    public function listarContas(): void{
        echo "---- Contas registradas ---- \n";
        foreach ($this->contas as $conta) {
            echo "============ \n";
            echo "Tipo da conta: " . $conta->getTipo() . "\n";
            echo "Nome cliente: " . $conta->getCliente() . "\n";
            echo "Saldo atual: " . $conta->getSaldo() . "\n";
            echo "============ \n";
        }
    }
}
