<?php

class ContaPoupancaDesafioChat extends ContaBancariaDesafioChat
{
    public function __construct(ClienteDesafioChat $cliente, float $saldo)
    {
        parent::__construct($cliente, $saldo);
    }
    
    // reescrevendo classe sacar apenas com a regra de que não é possível sacar valores negativos e zero e que aqui não aplicamos a taxa/limite de saque
    public function sacar(float $valor): bool
    {
        if ($valor >= 0) {
            $this->saldo -= $valor;
            return true;
        } else {
            return false;
        }
    }

}
