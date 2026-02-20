<?php 
namespace FaltaNotas\Traits;

trait LoggerTraitTc
{
    public function log(string $mensagem):void {
        echo "[" . date('H:i:s' . "] $mensagem\n");
    }
}
