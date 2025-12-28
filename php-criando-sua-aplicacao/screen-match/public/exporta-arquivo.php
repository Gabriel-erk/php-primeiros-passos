<?php 

$filme = [
    'nome' => $_POST['nome'],
    'ano' => $_POST['ano'],
    'nota' => $_POST['nota'],
    'genero' => $_POST['genero']
];

$caminhoAbsolutoJsonFilme = __DIR__ . '/filme.json';
// file_put_contents é para eu adicionar conteudo a um arquivo, no caso, quero adicionar no 'filme.json', como mostrado na váriavel acima, como ele não existe, será criado quando o file_put for executado, como segundo parâmetro, informo o CONTEÚDO que quero inserir no meu arquivo filme.json, que no caso, é o meu array associativo $filme no formato de json (função json_encode converte o valor passado para ele para o formato de json)
file_put_contents($caminhoAbsolutoJsonFilme, json_encode($filme));
