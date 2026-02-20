<?php 
namespace FaltaNotas\Traits;
use FaltaNotas\Model\ContaBancariaTc;
// Cada conta deve ter um ID único automático.
// Use propriedade static.
trait IdentificadorTraitTc {
    public static int $idConta = 0;
    public function defineId(ContaBancariaTc $conta) {
        // para acessar um atributo estático utiliza-se a palavra reservada "self" mais "::"
        $conta->id = self::$idConta;
        self::$idConta++;
    }
}