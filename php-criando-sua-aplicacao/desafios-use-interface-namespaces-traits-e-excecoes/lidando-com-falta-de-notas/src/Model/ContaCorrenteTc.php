<?php

namespace FaltaNotas\Model;

use FaltaNotas\Contracts\{
    OperacaoBancariaTc,
    TributavelTc
};

class ContaCorrenteTc extends ContaBancariaTc implements OperacaoBancariaTc, TributavelTc {}
