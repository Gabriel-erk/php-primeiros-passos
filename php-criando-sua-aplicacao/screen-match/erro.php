<?php 
// como comentado em outro arquivo, seguindo a psr-4 (php standard recommendations) nosso autoload não deve retornar nenhum tipo de erro, porém, caso isso aconteça, como iremos saber? como lidar com isso? e essa vai ser a responsabilidade deste arquivo aqui

use ScreenMatch\Calculos\ConversorNotaEstrela;
use ScreenMatch\Model\Episodio;
use ScreenMatch\Model\Genero;
use ScreenMatch\Model\Serie;

require_once 'autoload.php';

$serie = new Serie("Nome da série", 2000, Genero::Acao, 10, 20, 50);
$episodio = new Episodio($serie, "Título do episódio", 1);

$conversor = new ConversorNotaEstrela();
echo $conversor->converte($episodio);