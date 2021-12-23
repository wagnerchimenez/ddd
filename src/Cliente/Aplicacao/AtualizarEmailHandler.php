<?php

declare(strict_types=1);

namespace SuporteInformatica\Cliente\Aplicacao;

use SuporteInformatica\Cliente\Dominio\ClienteRepositorio;
use SuporteInformatica\Shared\Dominio\Email;
use SuporteInformatica\Cliente\Dominio\Excecao\ClienteNaoEncontradoExcecao;

class AtualizarEmailHandler
{
    private ClienteRepositorio $clienteRepositorio;

    public function __construct(
        ClienteRepositorio $clienteRepositorio
    ) {
        $this->clienteRepositorio = $clienteRepositorio;
    }

    public function executar(AtualizarEmail $command): void
    {

        $cliente = $this->clienteRepositorio->buscarPorId($command->id);

        if ($cliente === null) {
            throw new ClienteNaoEncontradoExcecao();
        }

        $cliente->atualizarEmail(
            Email::criar($command->email)
        );

        $this->clienteRepositorio->salvar($cliente);
    }
}
