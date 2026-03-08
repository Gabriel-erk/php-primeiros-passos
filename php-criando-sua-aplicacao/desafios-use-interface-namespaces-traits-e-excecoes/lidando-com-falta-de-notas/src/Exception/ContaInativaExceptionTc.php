<?php 

namespace FaltaNotas\Exception;

use Exception;
 
class ContaInativaExceptionTc extends Exception 
{
    public function __construct(){
        parent::__construct("Conta precisa estar ativa para sacar. \n");
    }
}
