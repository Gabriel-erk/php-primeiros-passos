<?php

$contasCorrentes = [
    '123.445.123-98' => [
        'Titular' => 'Hylander Comédia',
        'Saldo' => 87631
    ],
    
    '123.433.451-93' => [
        'Titular' => 'Marco Dos Anjos',
        'Saldo' => -98765
    ],
    
    '123.241.453.83' => [
        'Titular' => 'Fulano de tal',
        'Saldo' => 389778
    ]
];

if ($contasCorrentes['123.445.123-98']['Saldo'] > 0) {
    $contasCorrentes['123.445.123-98']['Saldo'] -= 150;
    echo $contasCorrentes['123.445.123-98']['Saldo'];
}