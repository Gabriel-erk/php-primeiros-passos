<?php 
namespace FaltaNotas\Traits;
// método log está em uma trait pois será usada por várias classes diferentes
trait LoggerTraitTc
{
    // método log tem como função registrar o que está acontecendo no sistema, geralmente para ajudar em controle e debug
    // no método abaixo pedimos um parâmetro (mensagem da ação que acabamos de tomar, ex: criação de usuário no método "create" da entidade usuário, a mensagem passada para o método log será: $this->log("Usuário criado")), a fim de salvar o registro
    // mais afundo, estamos concatenando colchetes com a data atual (retornada por date('H:i:s') e com a mensagem passada por parâmetro)
    public function log(string $mensagem):void {
        echo "[" . date('H:i:s') . "] $mensagem\n";
    }
}
