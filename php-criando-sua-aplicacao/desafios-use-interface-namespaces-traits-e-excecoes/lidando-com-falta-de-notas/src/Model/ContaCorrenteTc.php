<?php

namespace FaltaNotas\Model;

use FaltaNotas\Contracts\{
    OperacaoBancariaTc,
    TributavelTc
};
use FaltaNotas\Enums\TipoContaTc;
use FaltaNotas\Traits\LoggerTraitTc;

class ContaCorrenteTc extends ContaBancariaTc implements OperacaoBancariaTc, TributavelTc
{
    use LoggerTraitTc;
    private const float TAXA = 0.05;
    private const int LIMITE_EXTRA = 1000;

    public function __construct(ClienteTc $cliente, float $saldo)
    {
        parent::__construct($cliente, $saldo, TipoContaTc::CORRENTE);
    }

    public function calcularTaxa(float $valor): float
    {
        return $valor * self::TAXA;
    }

    public function sacar(float $valor): bool
    {
        $saquePermitido = $this->saldo + self::LIMITE_EXTRA;
        $taxaCalculada = $this->calcularTaxa($valor);
        $valorAdescontar = $valor + $taxaCalculada;

        $limiteExtra = self::LIMITE_EXTRA;
        if (
            $valor <= $saquePermitido &&
            $valor > 0 &&
            $this->saldo > 0 &&
            $this->ativa == true
        ) {
            $this->saldo -= $valorAdescontar;
            $this->log("Saque realizado.");
            return true;
        } else if (
            $valor <= $limiteExtra &&
            $valor > 0 &&
            $limiteExtra > 0 &&
            $this->ativa == true
         ) {
            $this->log("Saque por limite extra realizado.");
            $limiteExtra -= $valor;
            return true;
        } else {
            $this->log("Tentativa de saque fracassada.");
            return false;
        }
    }
}
