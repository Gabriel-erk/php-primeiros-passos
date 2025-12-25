<?php 

function miniCalculadora (string $operacaoMatematica, int $num1, int $num2){
	if($operacaoMatematica == "soma"){
		return $num1 + $num2;
	} elseif ($operacaoMatematica == "subtracao"){
		return $num1 - $num2;
	} elseif ($operacaoMatematica == "divisao"){
		return $num1 / $num2;
	} elseif ($operacaoMatematica == "multiplicacao"){
		return $num1 * $num2;
	} elseif ($operacaoMatematica == "módulo"){
		return $num1 % $num2;
	} elseif ($operacaoMatematica == "potência"){
		return $num1 ** $num2;
	} else {
        return "Operação inválida";
    }

}

$opcaoUsuario = (string) readline("Informe a operação matemática: ");
$valorUmUsuario = (int) readline("Informe o primeiro valor a ser calculado: ");
$valorDoisUsuario = (int) readline("Informe o segundo valor a ser calculado: ");

$resultadoOperacao = miniCalculadora($opcaoUsuario, $valorUmUsuario, $valorDoisUsuario);
echo "O resultado da operação é: " . $resultadoOperacao . PHP_EOL;