<?php 
namespace FaltaNotas\Traits;
// Como todo respeito chat mas eu nunca usei static na vida e não fazia ideia de como aplica-lo aqui e como vincular o atributo id daqui com cada objeto do tipo ContaBancariaTc, então criei um atributo privado em ContaBancariaTc e deixei esta Trait responsável pelo incremento do mesmo e o contador como responsável por trazes a quantidade total de contas instanciadas
trait IdentificadorTraitTc {
    // responsável por indicar a quantidade de contas registradas
    private int $contador = 0;
    // private static int $idConta = 0;
    public function defineId(int $idConta): int {
        // para acessar um atributo estático utiliza-se a palavra reservada "self" mais "::"
        $idConta = $this->contador;
        $this->contador++;
        return $idConta;
    }

    public function getTotalContasInstanciadas(){
        return $this->contador;
    }
}