<?php

class ContaPoupancaTb extends ContaBancariaTb
{
    public function __construct(ClienteTb $cliente, float $saldo)
    {
        parent::__construct($cliente, $saldo);
    }

    public function sacar(float $valor): bool
    {
        if ($this->ativa && $valor <= $this->saldo && $valor > 0) {
            $this->saldo -= $valor;
            return true;
        } else {
            return false;
        }
    }
}
