<?php

class ContaBancariaDesafioChat
{
    private bool $ativa;
    public const float LIMITE_SAQUE_PADRAO = 10000; // obviamente um readonly não funciona em uma constante KKKKKK, seu valor não pode ser trocado né jegue
    // ela sendo protected permite que ela não seja instanciada diretamente pois só é possível realizar uma instãncia/contexto de uma instancia seria no arquivo de execução, e o protected permite que este construtor apenas seja acessado pelas classes filhas dessa
    // obs: modificador do construct foi alterado de protected para public devido a reformulação do chat no exercicio
    // não coloquei como privado pois public + readonly terão um efeito mais efetivo e evitando getters e setters
    public function __construct(public readonly ClienteDesafioChat $cliente, public readonly float $saldo)
    {
        $this->ativa = true;
    }

    public function estaAtiva(): bool
    {
        return $this->ativa;
    }

    public function depositar(float $valor): bool
    {
        if ($this->estaAtiva() && $valor <= 0) {
            $this->saldo += $valor;
            return true;
        } else {
            return false;
        }
    }

    public function desativarConta(): bool
    {
        if (!$this->ativa || $this->saldo != 0) {
            // retorna false pois uma das condições acima é verdade (atributo ativa já é false, ou seja, conta já está desativada, OU o saldo é diferente de 0, pois se tiver algum valor (ou seja, $this->saldo != 0 retornar false) irá entrar nesse bloco de if), em um desses casos retornará falso, pois a ação de "desativar conta" não foi realizada
            return false;
        } else {
            // caso contrário da situação acima, defino a conta como "inativa" e retorno true pois o ato de "desativar conta" foi concluido
            $this->ativa = false;
            return true;
        }
    }

    // metódo que será sobreescrito nas classes filhas
    public function sacar(float $valor): bool
    {
        if ($valor > 0 && $valor <= $this->saldo && $valor <= self::LIMITE_SAQUE_PADRAO) {
            $this->saldo += $valor;
            return true;
        } else {
            return false;
        }
    }
}
