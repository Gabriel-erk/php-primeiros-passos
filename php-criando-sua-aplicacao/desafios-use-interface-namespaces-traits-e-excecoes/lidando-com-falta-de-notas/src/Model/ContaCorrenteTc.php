<?php

namespace FaltaNotas\Model;

use FaltaNotas\Contracts\{
    OperacaoBancariaTc,
    TributavelTc
};
use FaltaNotas\Enums\TipoContaTc;
use FaltaNotas\Traits\LoggerTraitTc;
use FaltaNotas\Exceptions\{
    ContaInativaException,
    SaldoInsuficienteException,
    ValorInvalidoExceptionTc
};

class ContaCorrenteTc extends ContaBancariaTc implements OperacaoBancariaTc, TributavelTc
{
    use LoggerTraitTc;

    private const float TAXA = 0.05;
    private const int LIMITE_EXTRA = 1000;
    static int $limiteExtra = self::LIMITE_EXTRA;

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

        if (!$this->ativa) {
            throw new ContaInativaException();
        }

        if ($valor > $saquePermitido) {
            throw new SaldoInsuficienteException();
        }

        // não preciso verificar se o $valor é menor ou igual ao $saquePermitido, pois no if acima verifico se ele é maior, caso for, dispara uma exception e para o sistema, caso não, o saldo é menor ou igual ao $saquePermitido, mantendo o fluxo normal e sacando apenas o valor correto
        if (
            $valor > 0 &&
            $this->saldo > 0 
        ) {
            $this->saldo -= $valorAdescontar;
            $this->log("Saque realizado.");
            return true;
        } else if (
            $valor <= self::$limiteExtra &&
            $valor > 0 &&
            self::$limiteExtra > 0
         ) {
            $this->log("Saque por limite extra realizado.");
            self::$limiteExtra -= $valor;
            return true;
        } else {
            $this->log("Tentativa de saque fracassada.");
            return false;
        }
    }
}
