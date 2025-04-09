<?php

function cria_array_associativo(array $nomes, array $idades):array
{
    $array_associativo = [
        0 => [
            'nome' => '',
            'idade' => 1
        ]
    ];
    foreach ($nomes as $nome) {
        $array_associativo[]['nome'] = $nome;
    }
    foreach ($idades as $idade) {
        $array_associativo[]['idade'] = $idade;
    }
    return $array_associativo;
}

$array_associativo_nomes_idades = cria_array_associativo(['joao', 'pedro', 'henrique', 'benicio'], [10,20,30,40]);

foreach ($array_associativo_nomes_idades as $array_associativo_nome_idade) {
    echo $array_associativo_nome_idade['nome'] . PHP_EOL;
    echo $array_associativo_nome_idade['idade'] . PHP_EOL;
}