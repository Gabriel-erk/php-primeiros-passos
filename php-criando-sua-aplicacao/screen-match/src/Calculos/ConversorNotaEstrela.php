<?php

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
