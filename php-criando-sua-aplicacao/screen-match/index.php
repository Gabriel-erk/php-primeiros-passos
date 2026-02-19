<?php
/* 
* conceito de autoload
* quero que quando eu executar meu código (como por exemplo, rodar este arquivo no terminal) e o php não encontre uma classe, interface, trait que está sendo usada neste arquivo, que ele procure no pedaço de código que irei informar a ele e importe automaticamente, fazendo o: autoload
* spl_autoload_register() é uma função padrão do php (como uma palavra reservada) que permite que eu registre uma função que vai tentar realizar o autoload de símbolos (classes, interfaces, traits etc)
* ela espera como argumento uma função (eu não sabia mas pelo visto no php é comum voce passar funções como parâmetro e recebê-las também)
* como estou passando uma função como parâmetro, não preciso dar um nome para ela (está sendo criada basicamente no momento da execução também)
* o parâmetro da função que estou passando de parâmetro para a função: spl_autoload_register é o nome do símbolo (nome da classe aqui)
* $className vai ter o valor do caminho da classe/símbolo, ao executar o arquivo esse spl_autoload_register já vai começar a rodar na hora (instantaneamente), seu primeiro valor vai ser o caminho até a classe "Filme" pois é a primeira que estou usando no sitema
* dentro da função que estamos passando por parâmetro ao spl, criamos uma váriavel chamada "caminho" que substitui "ScreenMatch" por "src" no parâmetro "className" que recebemos, pois, pelo menos nessa aplicação, tudo que possui um namespace está dentro da pasta "src", diminuindo o caminho e deixando a busca pelo arquivo desejado mais assertiva
* porém para que eu atinja o caminho 100% exato do meu arquivo, ainda falta a extensão ".php" que todos os arquivos php possuem, por isso, no fim, concateno o retorno da função "str_replace" (caminho do arquivo trocando ScreenMatch por src) com uma string '.php', assim por exemplo, se str_replace retornar src/Model/Filme ficará após concatenar com minha string: src/Model/Filme.php
*/
spl_autoload_register(function (string $className){
    $caminho = str_replace("ScreenMatch", "src", $className) . '.php';
    /* 
    * agora faço um require_once (once garante que seja incluido pelo menos uma vez e se já foi antes, não inclua de novo)
    * assim incluimos TODOS os símbolos que serão utilizados passando o caminho CORRETO até eles (reduzindo os trocentos require e caso mude algum caminho, eu não tenha que altera-lo aqui)
    */
    require_once $caminho;
});
/* 
* trazendo as classes/arquivos do meu namespace Model, onde posso trazer todos de uma vez com esse caminho use ScreenMatch\Model\{ classes que quero trazer aqui separadas por ","}
* outra forma de fazer também seria: use ScreenMatch\Model\Filme e etc, mas ai vai de gosto
*/
use ScreenMatch\Model\{
    Filme, Serie, Genero, Episodio 
};
use ScreenMatch\Calculos\{
    CalculadoraDeMaratona, ConversorNotaEstrela
};
echo "Bem-vindo(a) ao ScreenMatch" . PHP_EOL;
// objeto da classe filme
// sintaxe para utilizar o tipo (enum) Genero é chamar o enum "Genero::umDosCasosPossiveisAqui", como abaixo, coloquei o valor correspondente ao case "SuperHeroi", mas poderia ser acao etc
$filme = new Filme("Homem-aranha: de volta ao lar", 2020, Genero::SuperHeroi, 200);
/* 
* pedaço de código abaixo foi comentado pois agora, todos os meus atributos/propriedades estão PRIVADOS, logo, eu não consigo acessa-los de um arquivo de FORA DA MINHA CLASSE e inserir dados em massa (mas pq isso? pois é uma boa prática e mantem o código mais seguro e consiso, pois, qual o sentido de eu deixar livremente para qualquer arquivo simplesmente entrar e manipular as informações tão facilmente? outra coisa, qual a lógica disso? depois que um filme foi lançado, o nome dele muda toda hora? depois de um filme ser lançado, seu ano de lançamento muda toda hora? o genêro, por exemplo de thor ragnarok muda de ação pra romance do nada? exatamente, não faz sentido! por isso esses atributos/propriedades DEVEM ser privados, e utilizaremos de outra abordagem abaixo para colocar informações dentro dos atributos de um objeto)
*/
// $filme->nome = "Jogo do Bicho";
// $filme->anoLancamento = 2020;
// $filme->genero = "Ação";

$filme->avalia(10);
$filme->avalia(3);
$filme->avalia(5);
$filme->avalia(5);

var_dump($filme);
echo $filme->media() . PHP_EOL;
echo $filme->anoLancamento . PHP_EOL;

$serie = new Serie("Arcane", 2021, Genero::Acao, 2, 9, 50);
var_dump($serie);
$episodioSerie = new Episodio($serie, "Ashes and Blood", 5);

echo $serie->anoLancamento . PHP_EOL;

$serie->avalia(10);
$serie->avalia(5);
$serie->avalia(7);
$serie->avalia(8);

echo $serie->media() . PHP_EOL;

$calculadora = new CalculadoraDeMaratona();
$calculadora->inclui($serie);
echo "você tem " . $calculadora->getDuracao() . " minutos para maratonar" . PHP_EOL;
$calculadora->inclui($filme);
echo "você tem " . $calculadora->getDuracao() . " minutos para maratonar" . PHP_EOL;

$conversorNotaEstrela = new ConversorNotaEstrela();
echo $conversorNotaEstrela->converte($serie) . PHP_EOL;
echo $conversorNotaEstrela->converte($filme);