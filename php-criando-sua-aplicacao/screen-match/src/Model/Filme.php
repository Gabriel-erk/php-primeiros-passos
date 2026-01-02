<?php 

// definindo um modelo/molde/template dizendo o que todo filme precisa ter
// cada filme instanciado vai ter suas prórpiras características, porém, seguindo este padrão/modelo de construção
// todos os filmes que eu criar terão os atributos, comportamentos e métodos abaixo, dentro da classe filme
// para definir isso, usamos a palavra reservada "class", para representar que estamos criando uma classe, estamos criando o nosso próprio TIPO (como se fosse um int, float, double...são tipos), porém diferente dos outros tipos, esse é mais complexo pois possui vários valores ()
class Filme {
    // definindo os valores que TODO FILME PRECISA TER
    // palavra reservada que vai me permitir acessar o atributo quando eu tiver um atributo do tipo "Filme" desejado vem antes do nome do atributo (no caso, o modificador public)
    // especificar o tipo do atributo é considerado uma boa prática e evita erros bobos como alguém passar o uma string para o atributo ano de lançamento
    // public vem antes do nosso atributo para especificar que podemos acessa-lo fora do nosso "Filme", ou seja, fora da classe Filme
    public string $nome;
    public int $anoLancamento;
    public string $genero;
    // incializando meu array como um array vazio
    // utilizando private pois quero que apenas seja possivel acessar esse atributo de dentro da classe filme, pois seguindo nossa regra de negócio, qual é o sentido de, após eu receber minhas notas para meu filme (podendo realizar o cálculo da média dele e etc) e de repente no meu arquivo de execução eu zerar as notas com um: $meuFilme->notas = []; (definindo que o atributo é um array vazio) ou $meuFilme->notas =[0]; ?? isso não faz sentido e quebra nossa aplicação, as notas devem apenas ser adicionadas, não modificadas/removidas
    // qualquer outro código que não esteja dentro da classe não vai acessar essa propriedade/atributo notas - com private eu defino que qualquer arquivo/extensão não consiga ver este atributo fora da minha classe Filme, logo, essa linha aqui: $meuFilme->notas = []; me jogaria um erro no terminal dizendo que estou tentando acessar um atributo que eu não tenho acesso (claro, tentando fazer isso fora da minha classe/arquivo que minha classe está)
    /* 
    * qual o intuito deste comportamento?
    * evitar que um atributo importante para o funcionamento do sistema seja manipulado livremente por qualquer um e estrague o comportamento da minha aplicação
    * manipular o meu arquivo notas de forma segura, pois você pode pensar, tá, mas se eu não vou acessar esses atributos fora da classe, por que vou sequer cria-lo? como que eu vou manipulá-lo? qual sua utilidade afinal? e ai vem o seu real uso, que é, permitir que meu atributo privado $notas seja manipulado da maneira que EU desejar, pois caso observe bem o código em "Filme.php" e "index.php" eu ainda estou manipulando o atributo $notas, porém, com o comportamento desejado, evitando uma série de erros
    * faço isso pois no "index.php" chamo meu método avalia (que passa valores para meu atributo notas, ou seja, comportamento fixo e filtrado, não permito que altere/delete a qualquer momento o valor do campo $notas, apenas que inclua, pois é isso que meu método publico "avalia" faz)
    * logo após, em "index.php" também, chamo meu método "media" que realiza a soma e calcula a média das notas presentes em $notas, mais uma vez, um COMPORTAMENTO ESPERADO E CONTROLADO POR MIM, fazendo exatamente o que eu quero, não manipulando o atributo livremente ao bel prazer do usuário
    * esse é o intuito do uso de atributos privados que compreendi, você irá usa-los de formas diferentes, desde valores fixos até permitir que recebão valores de fora, porém por meios seguros, como os "métodos", igual no exemplo que utilizamos agora onde permito manipular os valores de $notas de dentro da classe e o único comportamenteo que "permito"/é "publico" é o de inserção, que não é tão público assim pois, em um método eu passo valores para o atributo $notas através de um parâmetro do método "avalia" e depois, por estar dentro da classe e poder fazer isso, no outro método, eu apenas faço a soma de todos os valores presentes no array $notas e divido esse valor pela quantidade de itens que esse mesmo array ($notas) possui
    */
    private array $notas = [];

    // subrotina, pois não retorna nada, apenas realiza uma ação
    // modificador de acesso public para dizer que nosso método pode ser acessado de fora do nosso Filme, ou seja fora da nossa classe Filme
    public function avalia(float $nota): void{
        // para executar/chamar os métodos funções (serão chamados a partir de um objeto que instanciou esta classe), eu preciso especificar que estou chamando o atributo publico "$notas" do objeto que CHAMOU essa função, caso no meu objeto "$filme20" eu chame $filme20->avalia(10), dentro do método eu preciso estar especificando que, estou chamando o atributo $notas exatamente responsavel pelo $filme 20, se não, me gerará um erro e não conseguirei prosseguir com a execuçaõ do programa
        // devido a isso, é utilizado o "$this" antes de chamar os atributos da classe, pois os métodos/funções não o reconhecem, o atributos definidos fora do método não enxergam os atributos da minha classe sem a palavra $this antes do atributo em si
        // $this = esse (use o atributo para esse objeto que chamou a função)
        // $this = palavra reservada que indica o objeto utilizado para executar a função
        $this->notas[] = $nota;
    }

    public function media(): float {
        $somaNotas = array_sum($this->notas);
        // count conta a quantidade de itens dentro do array
        $quantidadeNotas = count($this->notas);
        return $somaNotas / $quantidadeNotas;
    }
}