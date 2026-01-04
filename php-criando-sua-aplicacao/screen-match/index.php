<?php 
require_once __DIR__ . "/src/Model/Filme.php";

echo "Bem-vindo(a) ao ScreenMatch" . PHP_EOL;
// objeto da classe filme
$filme = new Filme();
$filme->set_nome("Jogo das malucas");
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

