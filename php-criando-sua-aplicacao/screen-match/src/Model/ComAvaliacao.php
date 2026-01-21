<?php

// trait vai permitir que separemos um espaço do nosso código principal para chamar outro código (como se fosse o nosso require, que por debaixo dos panos pega e "cola" no arquivo que chamamos o require o arquivo indicado pelo mesmo) 
// palavra reservada trait nada mais é do que uma "característica de uma classe", nesse caso a nossa trait vai ser uma "característica de uma classe que possui avaliação"
// traduzindo do inglês, trait = característica = mecanismo para reutilizar código sem duplicação (que pode ser utilizada em várias classes)
// em outros termos também poderiamos chamar de "herança horizontal" (falando em diagramas de classe, a classe que herda sempre fica abaixo da classe pai, porém na herança horizontal ambas ficam lado a lado, como se estivessem no "mesmo nível", elas não herdam, elas não estendem a outra classe, elas "utilizam" a outra classe, por isso o nome herança horizontal), aqui é como se fosse o processo de herança mas sem utilizar um tipo
// não deve ser considerada um tipo, como hábito das boas práticas, não passamos Trait como tipo de parâmetro, retorno, NADA, ela pode até "ser aceita" pelo código, mas não devemos fazer isso como programadores, Traits são características utilizadas pelas classes
// permitem remover duplicação de código (pois estou centralizando o código em um único lugar e "chamando" o mesmo pedaço, o mesmo código, em vários arquivos diferentes) sem usar herança 
// "Permite um copiar e colar código de um lugar para o outro"
// conceito de Trait se resume em: "còdigo que pode ser reutilizado"
trait ComAvaliacao
{
    // por mais que seja uma pratica a se evitar nesse conceito de classes inicializar um atributo/propriedade fora do construtor, nesse cenário, nos NÃO temos um construtor, logo, é mais interessante inicializarmos por aqui
    private array $notas = [];

   // subrotina, pois não retorna nada, apenas realiza uma ação
    // modificador de acesso public para dizer que nosso método pode ser acessado de fora do nosso Filme, ou seja fora da nossa classe Filme
    public function avalia(float $nota): void
    {
        // para executar/chamar os métodos funções (serão chamados a partir de um objeto que instanciou esta classe), eu preciso especificar que estou chamando o atributo publico "$notas" do objeto que CHAMOU essa função, caso no meu objeto "$filme20" eu chame $filme20->avalia(10), dentro do método eu preciso estar especificando que, estou chamando o atributo $notas exatamente responsavel pelo $filme 20, se não, me gerará um erro e não conseguirei prosseguir com a execuçaõ do programa
        // devido a isso, é utilizado o "$this" antes de chamar os atributos da classe, pois os métodos/funções não o reconhecem, o atributos definidos fora do método não enxergam os atributos da minha classe sem a palavra $this antes do atributo em si
        // $this = esse (use o atributo para esse objeto que chamou a função)
        // $this = palavra reservada que indica o objeto utilizado para executar a função
        $this->notas[] = $nota;
    }

    public function media(): float
    {
        $somaNotas = array_sum($this->notas);
        // count conta a quantidade de itens dentro do array
        $quantidadeNotas = count($this->notas);
        return $somaNotas / $quantidadeNotas;
    }
}
