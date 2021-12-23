<?php

declare(strict_types=1);

namespace Tests\Cliente\Aplicacao;

use PHPUnit\Framework\TestCase;
use SuporteInformatica\Cliente\Aplicacao\AtualizarEmail;
use SuporteInformatica\Cliente\Aplicacao\AtualizarEmailHandler;
use SuporteInformatica\Cliente\Dominio\Cliente;
use SuporteInformatica\Shared\Dominio\CPF;
use SuporteInformatica\Shared\Dominio\Email;
use SuporteInformatica\Cliente\Infraestrutura\EmMemoriaClienteRepositorio;

class AtualizarEmailHandlerTest extends TestCase
{
    public function testDeveAtualizarEmailDoCliente(): void
    {
        $clienteRepositorio = new EmMemoriaClienteRepositorio([
            Cliente::criar(
                10,
                'Felipe Antônio Lima',
                Email::criar('emailvalido@gmail.com'),
                CPF::criar('937.653.690-80')
            )
        ]);

        $command = new AtualizarEmail(
            10,
            'felipe_antonio@gmail.com'
        );

        $handler = new AtualizarEmailHandler(
            $clienteRepositorio
        );

        $handler->executar($command);

        $cliente = $clienteRepositorio->buscarPorId(10);

        $this->assertInstanceOf(Cliente::class, $cliente);
    }
}
