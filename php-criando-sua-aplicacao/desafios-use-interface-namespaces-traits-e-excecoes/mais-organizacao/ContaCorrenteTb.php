<?php

class ContaCorrenteTb extends ContaBancariaTb
{
    // definindo que o valor da nossa taxa saque é de 5% (porém em valores decimais, pois para sabermos por exemplo, 5% do saque atual é só multiplicar o valor de saque por essa constante)
    public const TAXA_SAQUE_TB = 0.05;

    public function __construct(ClienteTb $cliente, float $saldo)
    {
        parent::__construct($cliente, $saldo, TipoContaTb::Corrente);
    }

    public function sacar(float $valor): bool
    {
        if ($this->ativa && $valor > 0 && $valor <= $this->saldo + $this->saldo * self::TAXA_SAQUE_TB && $valor <= self::LIMITE_SAQUE_PADRAO_TB) {
            $this->saldo -= $valor + $valor * self::TAXA_SAQUE_TB;
            return true;
        } else {
            return false;
        }
    }
}
