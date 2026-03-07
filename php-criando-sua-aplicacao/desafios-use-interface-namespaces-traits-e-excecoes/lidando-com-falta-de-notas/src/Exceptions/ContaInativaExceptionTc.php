<?php 

namespace FaltaNotas\Exceptions;

use Exception;
 
class ContaInativaException extends Exception 
{
    public function __construct(){
        parent::__construct("Conta precisa estar ativa para sacar. \n");
    }
}
