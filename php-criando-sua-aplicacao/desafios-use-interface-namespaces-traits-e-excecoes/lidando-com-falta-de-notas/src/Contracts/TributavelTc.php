<?php 
namespace FaltaNotas\Contracts;

// somente conta corrente implementa esta aqui
interface TributavelTc{
    public function calcularTaxa(float $valor): float;
}