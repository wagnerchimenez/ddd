<?php

declare(strict_types=1);

namespace SuporteInformatica\Shared\Dominio;

use SuporteInformatica\Shared\Dominio\Excecao\EmailInvalidoExcecao;

class Email
{
    private string $email;

    private function __construct(
        string $email
    ) {
        $this->email = $email;
    }

    public static function criar(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new EmailInvalidoExcecao();
        }

        return new self($email);
    }
}
