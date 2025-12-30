<?php 

// definindo um modelo/molde/template dizendo o que todo filme precisa ter
// cada filme instanciado vai ter suas prórpiras características, porém, seguindo este padrão/modelo de construção
// todos os filmes que eu criar terão os atributos, comportamentos e métodos abaixo, dentro da classe filme
// para definir isso, usamos a palavra reservada "class", para representar que estamos criando uma classe, estamos criando o nosso próprio TIPO (como se fosse um int, float, double...são tipos), porém diferente dos outros tipos, esse é mais complexo pois possui vários valores ()
class Filme {
    // definindo os valores que TODO FILME PRECISA TER
    // palavra reservada que vai me permitir acessar o atributo quando eu tiver um atributo do tipo "Filme" desejado vem antes do nome do atributo (no caso, o modificador public)
    // especificar o tipo do atributo é considerado uma boa prática e evita erros bobos como alguém passar o uma string para o atributo ano de lançamento
    public string $nome;
    public int $anoLancamento;
    public string $genero;
    public float $nota;
}