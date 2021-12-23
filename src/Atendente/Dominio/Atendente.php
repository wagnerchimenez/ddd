<?php

declare(strict_types=1);

namespace SuporteInformatica\Atendente\Dominio;

use SuporteInformatica\Shared\Dominio\Email;

class Atendente
{
    private int $id;
    private string $nome;
    private Email $email;
    private string $setor;

    private function __construct(
        int $id,
        string $nome,
        Email $email,
        string $setor
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->setor = $setor;
    }

    public static function criar(
        int $id,
        string $nome,
        Email $email,
        string $setor
    ): self {
        return new self(
            $id,
            $nome,
            $email,
            $setor
        );
    }

    public function id(): int
    {
        return $this->id;
    }
}
