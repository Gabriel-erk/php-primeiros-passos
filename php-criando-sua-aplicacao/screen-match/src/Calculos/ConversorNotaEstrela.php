<?php
// aqui estou definindo que o namespace desta classe "ConverteNotaEstrela" é "ScreenMatch\Calculos", logo, tudo que estiver neste arquivo (classes, traits, interfaces...) serão buscadas APENAS dentro deste namespace "ScreenMatch\Calculos", o que podemos ver que não irá funcionar corretamente pois no meu método "converte" eu estou pedindo por parâmetro algo do tipo "Avaliavel", que se encontra em OUTRO namespace (explicação sobre no use)
// caso eu queira solicitar este arquivo em outro arquivo eu teria de usar: ScreenMatch\Calculos\ConversorNotaEstrela - pois por mais que eu não tenha definido o nome "ConversorNotaEstrela" na linha abaixo para se referenciar a este arquivo, o PHP é inteligente e isso não se faz necessário, na linha 4 onde defino a que "grupo de classes" esta classe "ConversorNotaEstrela" pertence com "namespace ScreenMatch\Calculos" automaticante para me referenciar a este arquivo eu colocarei o nome dele a frente da última palavra para chama-lo, assim completando o caminho até ele, ficando ao certo: use ScreenMatch\Calculos\ConversorNotaEstrela, assim terei acesso ao meu conversor de qualquer arquivo que chama-lo
namespace ScreenMatch\Calculos;
// logo após a definição do namespace, defino quais classes, traits, interfaces quero solicitar que não estão presentes no namespace atual "ScreenMatch\Calculos" e assim, solicito o que eu estava precisando, a interface avaliavel dentro do namespace ScreenMatch\Model - comando já busca da raiz, ou seja, eu não precisarai "voltar uma pasta" com: use \ScreenMatch\Model\Avaliavel
use ScreenMatch\Model\Avaliavel;

class ConversorNotaEstrela
{
    // porque trocar o tipo de parâmetro de Titulo para Avaliavel? pois TUDO que for avaliavel vai ter o método media, incluindo minha classe episodio, que implementa a interface avaliavel (tudo que implementar a interface avaliavel irá se encaixar aqui, poderá ser passado como parâmetro para meu método "converte") agora, se eu definir como "titulo", não posso utilizar este método para meus episódios
    public function converte(Avaliavel $avaliavel): float
    {
        $nota = $avaliavel->media();
        // usando como parâmetro que iremos receber notas de 0 a 10 e queremos converter para 0 a 5 estrelas, arredondando para o inteiro mais próximo e depois dividindo por 2 para que fique na escala de 0 a 5 (ou seja, 0 a 5 estrelas)
        return round($nota) / 2;
    }
}
