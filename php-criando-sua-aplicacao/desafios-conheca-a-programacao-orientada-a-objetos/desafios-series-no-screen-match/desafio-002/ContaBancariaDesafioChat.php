<?php

class ContaBancariaDesafioChat
{
    private bool $ativa;
    public const float LIMITE_SAQUE_PADRAO = 10000; // obviamente um readonly não funciona em uma constante KKKKKK, seu valor não pode ser trocado né jegue
    // ela sendo protected permite que ela não seja instanciada diretamente pois só é possível realizar uma instãncia/contexto de uma instancia seria no arquivo de execução, e o protected permite que este construtor apenas seja acessado pelas classes filhas dessa
    // não coloquei como privado pois public + readonly terão um efeito mais efetivo e evitando getters e setters
    protected function __construct(public readonly ClienteDesafioChat $cliente, public readonly float $saldo)
    {
        $this->ativa = true;
    }

    public function estaAtiva(): bool
    {
        return $this->ativa;
    }

    protected function aumentarSaldo(float $valor): bool
    {
        if ($valor > 0) {
            $this->saldo += $valor;
            return true;
        } else {
            return false;
        }
    }

    protected function diminuirSaldo(float $valor): bool
    {
        if ($valor > 0 && $this->saldo > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
            return true;
        } else {
            return false;
        }
    }

    protected function desativarConta(): bool
    {
        if ($this->ativa) {
            $this->ativa = false;
            // true ela foi desativada com sucesso
            return true;
        } else {
            // false ela já estava desativada/se encontra desativada
            return false;
        }
    }

    // metódo que será sobreescrito
    protected function sacar(float $valor): bool{
        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo += $valor;
            return true;
        } else {
            return false;
        }
    }
}
