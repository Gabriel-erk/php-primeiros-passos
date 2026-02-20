<?php

namespace FaltaNotas\Model;
// possuo um namespace chamado de "FaltaNotas\Model", o namespace onde estamos agora devido a esse namespace lógico padrão é "FaltaNotas\Model\ContaPoupancaTc", todo símbolo que eu solicitar dentro dessa classe, será procurado apenas dentro do namespace "FaltaNotas\Model" ou "FaltaNotas\Model\ContaPoupancaTc", devido a minha divisão de pastas e namespaces, minha interface (que é necessária nesta classe aqui), não se encontra em nenhum dos namespaces citados acima, fazendo com que o sistema não o encontre
// a não ser que façamos a solicitação direta dele, utilizando seu caminho (ou namespace próprio), fazendo com que seja finalmente encontrado e possamos prosseguir normalmente com a aplicação 
use FaltaNotas\Contracts\OperacaoBancariaTc;

class ContaPoupancaTc extends ContaBancariaTc implements OperacaoBancariaTc
{
    
}
