<?php

class ContaBancariaServiceTb
{
    public function depositar(ContaBancariaTb $conta, float $valor): string
    {
        if ($conta->depositar($valor)) {
            return "Depósito na conta {$conta->tipoConta->name} do cliente {$conta->cliente->nome} realizado com sucesso!";
        } else {
            return "Depósito na conta {$conta->tipoConta->name} do cliente {$conta->cliente->nome}não foi efetuada, verificar se conta está ativa ou valor é maior que 0.";
        }
    }

    public function sacar(ContaBancariaTb $conta, float $valor): string
    {
        if ($conta->sacar($valor) && $conta->tipoConta == TipoContaTb::Corrente) {
            return "Saque na conta {$conta->tipoConta->name} do cliente {$conta->cliente->nome} realizado com sucesso! (com taxa de 5% aplicada)";
        } else if ($conta->sacar($valor)) {
            return "Saque na conta {$conta->tipoConta->name} do cliente {$conta->cliente->nome} realizado com sucesso!";
        } else {
            return "Saque na conta {$conta->tipoConta->name} do cliente {$conta->cliente->nome}não foi efetuado, verificar se conta está ativa ou valor é válido.";
        }
    }

    public function verSaldo(ContaBancariaTb $conta): string
    {
        return "O saldo atual da conta {$conta->tipoConta->name} do cliente {$conta->cliente->nome} é de R$ {$conta->getSaldo()}.";
    }

    public function desativar(ContaBancariaTb $conta): string
    {
        if ($conta->desativar()) {
            return "Conta {$conta->tipoConta->name} do cliente {$conta->cliente->nome} foi desativada com sucesso!";
        } else {
            return "Conta {$conta->tipoConta->name} do cliente {$conta->cliente->nome} não foi desativada, verificar se saldo ainda é positivo ou já não foi desativada.";
        }
    }
}
