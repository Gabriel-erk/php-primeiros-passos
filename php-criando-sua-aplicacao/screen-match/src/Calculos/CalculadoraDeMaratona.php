<?php 

class CalculadoraDeMaratona 
{

    private int $duracaoMaratona = 0; 
    // cada vez que adicionar um titulo, tenho que calcular o tempo dele(lembrando que tenho minha classe titulo, e todo filme,serie etc é um titulo, logo, quando "adicionar um titulo" é adicionar um objeto do tipo titulo, ou seja, uma série ou filme (que herdam da classe titulo))
    // não importa se é serie ou filme, sei que todo "Titulo $titulo" tem o método "duracaoEmMinutos", logo, posso chamar esse método independente do tipo de objeto que estou passando (filme ou série)
    public function inclui(Titulo $titulo): void{
        // qualquer objeto do tipo titulo poderá chamar o método abaixo e incrementar o valor retornado no atributo duracaoMaratona - e dependendo do "método que for passado" o calculo dentro de duracaoEmMinutos será diferente, pois cada classe filha (filme e série) implementam esse método de forma diferente
        $this->duracaoMaratona += $titulo->duracaoEmMinutos();
    }

    public function getDuracao(): int{
        return $this->duracaoMaratona;
    }
}
