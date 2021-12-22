<?php

declare(strict_types=1);

namespace SuporteInformatica\Cliente\Dominio;

use SuporteInformatica\Cliente\Dominio\Excecao\CPFInvalidoExcecao;

class CPF
{
    private string $cpf;

    private function __construct(
        string $cpf
    ) {
        $this->cpf = $cpf;
    }

    public static function criar(string $cpf): self
    {
        $regex = "/(\d{3})\.(\d{3})\.(\d{3})\-(\d{2})/";

        if (!preg_match($regex, $cpf)) {
            throw new CPFInvalidoExcecao();
        }

        return new self($cpf);
    }
}
