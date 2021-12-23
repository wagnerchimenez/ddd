<?php

declare(strict_types=1);

namespace Tests\Atendente\Aplicacao;

use PHPUnit\Framework\TestCase;
use SuporteInformatica\Atendente\Aplicacao\AtenderSolicitacaoDeSuporte;
use SuporteInformatica\Atendente\Aplicacao\AtenderSolicitacaoDeSuporteHandler;
use SuporteInformatica\Atendente\Dominio\Atendente;
use SuporteInformatica\Atendente\Dominio\Setor;
use SuporteInformatica\Atendente\Infraestrutura\EmMemoriaAtendenteRepositorio;
use SuporteInformatica\Shared\Dominio\Email;
use SuporteInformatica\Suporte\Dominio\Suporte;
use SuporteInformatica\Suporte\Infraestrutura\EmMemoriaSuporteRepositorio;

class AtenderSolicitacaoDeSuporteHandlerTest extends TestCase
{

    public function testAtendenteAdicionaHistoricoASolicitacaoDeSuporte(): void
    {
        $suporteRepositorio = new EmMemoriaSuporteRepositorio([
            Suporte::criarComSolicitacao(
                1520,
                336,
                'Manutencao de rotina computador central'
            )
        ]);

        $atendenteRepositorio = new EmMemoriaAtendenteRepositorio([
            Atendente::criar(
                23,
                'Rogerio de Almeida Junior',
                Email::criar('rogerioalmeida@gmail.com'),
                Setor::SETOR_SUPORTE
            )
        ]);

        $command = new AtenderSolicitacaoDeSuporte(
            1520,
            23
        );

        $handler = new AtenderSolicitacaoDeSuporteHandler(
            $atendenteRepositorio,
            $suporteRepositorio
        );

        $handler->executar($command);

        $suporte = $suporteRepositorio->buscarPorId(1520);

        $this->assertIsArray($suporte->historico());
        $this->assertCount(1, $suporte->historico());
        $this->assertEquals('Atendente 23 iniciou atendimento a solicitação 1520', current($suporte->historico()));
    }
}
