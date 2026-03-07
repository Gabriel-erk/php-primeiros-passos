<?php 

namespace FaltaNotas\Exceptions;

use Exception;

class SaldoInsuficienteException extends Exception 
{
    public function __construct(){
        return parent::__construct("Saldo insuficiente para saque.");
    }
}
