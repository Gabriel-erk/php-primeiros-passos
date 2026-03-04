<?php 

require_once __DIR__ . DIRECTORY_SEPARATOR . "autoload.php";

use PlaylistInteligente\Model\Musica;
use PlaylistInteligente\Service\PlaylistService;

$musicaUm = new Musica("Enemy", "Imagine Dragons", 5, "Pop");
$musicaDois = new Musica("When we", "Tank", 4, "R&B");
$musicaTres = new Musica("I think he knows", "Taylor Swift", 3, "Pop");
$musicaQuatro = new Musica("Don't", "Bryson Tiller", 3, "R&B");
$musicaCinco = new Musica("Woman", "Doja cat", 4, "Pop");

$service = new PlaylistService();
$playlist = $service->createPlaylist("Playlist do g.azin");

echo $service->addMusica($playlist, $musicaUm);
echo $service->addMusica($playlist, $musicaDois);
echo $service->addMusica($playlist, $musicaTres);
echo $service->addMusica($playlist, $musicaQuatro);

var_dump($musicaCinco->nomeMusica);
echo $service->removerMusica($playlist, $musicaCinco->nomeMusica);