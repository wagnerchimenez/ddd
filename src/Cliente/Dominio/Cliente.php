<?php

declare(strict_types=1);

namespace SuporteInformatica\Cliente\Dominio;

class Cliente
{
    private int $id;
    private string $nome;
    private Email $email;
    private CPF $cpf;

    private function __construct(
        int $id,
        string $nome,
        Email $email,
        CPF $cpf
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
    }

    public static function criar(
        int $id,
        string $nome,
        Email $email,
        CPF $cpf
    ): self {
        return new self(
            $id,
            $nome,
            $email,
            $cpf
        );
    }

    public function id(): int
    {
        return $this->id;
    }

    public function atualizarEmail(Email $email): void
    {
        $this->email = $email;
    }
}
