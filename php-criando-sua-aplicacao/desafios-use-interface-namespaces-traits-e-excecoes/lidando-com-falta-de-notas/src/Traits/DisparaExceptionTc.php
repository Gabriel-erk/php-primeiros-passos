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
}
