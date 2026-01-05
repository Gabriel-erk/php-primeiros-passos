<?php
class ContaBancariaComplexa
{
    private bool $ativa;
    public function __construct(private Cliente $cliente, private float $saldo)
    {
        $this->ativa = true;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }

    public function verificaAtividade(): bool
    {
        return $this->ativa;
    }

    public function deposito(float $valorDeposito): void
    {
        if ($this->verificaAtividade() && $valorDeposito > 0) {
            $this->saldo += $valorDeposito;
            echo "Deposito realizado na conta do cliente: " . $this->cliente->getNome() . " - Saldo atual: " . $this->saldo . PHP_EOL;
        } else {
            echo "conta inativa ou valor invalido para depósito" . PHP_EOL;
        }
    }

    public function saque($valorSaque): void {
        if ($this->verificaAtividade() && $valorSaque > 0 && $valorSaque < $this->saldo) {
            $this->saldo -= $valorSaque;
            echo "Saque realizado na conta do cliente: " . $this->cliente->getNome()  . " - Saldo atual: " . $this->saldo . PHP_EOL;
        } else {
            echo "conta inativa ou valor de saque invalido" . PHP_EOL;
        }
    }

    public function encerrarConta(): void{
        if ($this->verificaAtividade()) {
            $this->ativa = false;
            echo "Conta do cliente: " . $this->cliente->getNome() . " foi encerrada com sucesso." . PHP_EOL;
        } else {
            echo "conta já se encontra inativa." . PHP_EOL;
        }
    }
}
