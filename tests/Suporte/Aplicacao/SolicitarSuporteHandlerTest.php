<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SuporteInformatica\Cliente\Dominio\Cliente;
use SuporteInformatica\Cliente\Dominio\CPF;
use SuporteInformatica\Cliente\Dominio\Email;
use SuporteInformatica\Cliente\Infraestrutura\EmMemoriaClienteRepositorio;
use SuporteInformatica\Suporte\Aplicacao\SolicitarSuporte;
use SuporteInformatica\Suporte\Aplicacao\SolicitarSuporteHandler;
use SuporteInformatica\Suporte\Dominio\Suporte;
use SuporteInformatica\Suporte\Infraestrutura\EmMemoriaSuporteRepositorio;

class SolicitarSuporteHandlerTest extends TestCase
{

    public function testDeveSolicitarSuporteParaCliente(): void
    {
        $suporteRepositorio = new EmMemoriaSuporteRepositorio();
        $clienteRepositorio = new EmMemoriaClienteRepositorio([
            Cliente::criar(
                150,
                'Mariana dos Santos',
                Email::criar('marianasantos@gmail.com'),
                CPF::criar('456.789.621-98')
            )
        ]);

        $command = new SolicitarSuporte(
            1,
            150,
            'Formatação computador da recepção, pois está apresentando problemas!'
        );

        $handler = new SolicitarSuporteHandler(
            $suporteRepositorio,
            $clienteRepositorio
        );

        $handler->executar($command);

        $suporte = $suporteRepositorio->buscarPorCliente(150);

        $this->assertInstanceOf(Suporte::class, $suporte);
    }
}
