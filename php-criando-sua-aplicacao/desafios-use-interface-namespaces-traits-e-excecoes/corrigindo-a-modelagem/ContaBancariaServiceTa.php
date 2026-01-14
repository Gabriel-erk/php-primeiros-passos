<?php
// essa classe NÃO ALTERA O SALDO DIRETAMENTE
// apenas chama métodos das contas bancarias, interpreta o retorno que elas irão dar (todas foram configuradas para retornar um valor booleano, ou seja, true ou false)
// e a classe devolve MENSAGENS (ou seja, os métodos devolvem mensagens a respeito do resultado das execuções dos métodos das classes)
class ContaBancariaServiceTa
{
    // outra parte do polimorfismo, pois minha classe ContaBancariaService/método sacar/depoito não sabe se o valor que está sendo passado para o parâmetro "ContaBancariaTa $conta" é corrente ou poupança e mesmo assim o comportamento será o mesmo (objetos "diferentes" com comportamentos iguais, no caso, dando certo o retorno das mensagens será o mesmo)
    public function depositar(ContaBancariaTa $conta, float $valor): string
    {
        if ($conta->depositar($valor)) {
            return "Depósito na conta " . $conta->tipoConta->value . " do cliente: " . $conta->cliente->nome . " realizada com sucesso!";
        } else {
            return "Depósito na conta " . $conta->tipoConta->value . " do cliente: " . $conta->cliente->nome . " não foi realizada, verificar se conta está ativa ou valor para depósito é maior do que zero.";
        }
    }

    public function sacar(ContaBancariaTa $conta, float $valor): string
    {
        if ($conta->sacar($valor)) {
            return "Saque na conta " . $conta->tipoConta->value . " do cliente: " . $conta->cliente->nome . " realizada com sucesso!";
        } else {
            return "Saque na conta " . $conta->tipoConta->value . " do cliente: " . $conta->cliente->nome . " não foi realizada, verificar se conta está ativa ou digitou um valor válido (respeitando limite de saque e taxa de manutenção).";
        }
    }

    public function desativar(ContaBancariaTa $conta): string
    {
        if ($conta->desativar()) {
            return "Conta " . $conta->tipoConta->value . " do cliente: " . $conta->cliente->nome . ", desativada com sucesso!";
        } else {
            return "Conta " . $conta->tipoConta->value . " do cliente: " . $conta->cliente->nome . ", não foi desativada, por favor verificar se conta já não se encontra desativada ou saldo ainda é diferente de 0.";
        }
    }

    public function status(ContabancariaTa $conta): string
    {
        if ($conta->estaAtiva()) {
            return "Conta " . $conta->tipoConta->value . " está ativa.";
        } else {
            return "Conta " . $conta->tipoConta->value . " está desativada.";
        }
    }
}
