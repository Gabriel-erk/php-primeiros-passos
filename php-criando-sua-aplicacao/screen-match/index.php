<?php
// incluindo o genero antes do filme pois o próprio filme usa o genero
require_once __DIR__ . "/src/Model/Genero.php";
require_once __DIR__ . "/src/Model/Titulo.php";
require_once __DIR__ . "/src/Model/Filme.php";
require_once __DIR__ . "/src/Model/Serie.php";
require_once __DIR__ . "/src/Model/Episodio.php";
require_once __DIR__ . "/src/Calculos/CalculadoraDeMaratona.php";

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