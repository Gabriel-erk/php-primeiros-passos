<?php 

class ContaPoupancaDesafioChat extends ContaBancariaDesafioChat
{
    public function __construct(ClienteDesafioChat $cliente, float $saldo)
    {
        parent::__construct($cliente, $saldo);
    }
    // não reescrevi pois na classe pai eu já não permito valores negativos
}
