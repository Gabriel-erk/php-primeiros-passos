<?php
namespace FaltaNotas\Traits;

use FaltaNotas\Exception\{
    ContaInativaExceptionTc,
    SaldoInsuficienteExceptionTc,
    ValorInvalidoExceptionTc
};

trait DisparaExceptionTc
{
    public function contaInativaException(bool $ativa): void
    {
        if (!$ativa) {
            throw new ContaInativaExceptionTc();
        }
    }

    public function saldoInsuficienteException(float $valorSaque, float $saquePermitido): void {
        if ($valorSaque > $saquePermitido) {
            throw new SaldoInsuficienteExceptionTc();
        }
    }
}
