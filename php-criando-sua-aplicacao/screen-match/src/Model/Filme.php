<?php

// definindo um modelo/molde/template dizendo o que todo filme precisa ter
// cada filme instanciado vai ter suas prórpiras características, porém, seguindo este padrão/modelo de construção
// todos os filmes que eu criar terão os atributos, comportamentos e métodos abaixo, dentro da classe filme
// para definir isso, usamos a palavra reservada "class", para representar que estamos criando uma classe, estamos criando o nosso próprio TIPO (como se fosse um int, float, double...são tipos), porém diferente dos outros tipos, esse é mais complexo pois possui vários valores ()
// extends quer dizer que a minha classe mais especifica (filme, é especifica pois é voltada apenas para filmes, nada mais) extende de outra classe mais genérica (Titulo, mais genérica pois o seu conteúdo é o que mais de uma série pode ter, ela é como uma base para os filhos poderem criar as próprias pernas), ou seja, pega os atributos e metódos da classe mais genérica e permite qua a classe filme tenha suas próprias outras propriedasdes/metódos
// com extends estou querendo dizer que "a classe filme é um título e extende/adiciona coisas a mais, coloca informações a mais tendo como base a classe titulo"
// dica: se possivel evitar usar herança, apenas em casos como esse, onde "Uma série é um título"/"Um filme é um título"
class Filme extends Titulo
{

    public function __construct(public readonly int $duracaoEmMinutos)
    {
      
    }

}
