<?php

declare(strict_types=1);

namespace SuporteInformatica\Cliente\Aplicacao;

class AtualizarEmail
{
    public int $id;
    public string $email;

    public function __construct(
        int $id,
        string $email
    ) {
        $this->id = $id;
        $this->email = $email;
    }
}
