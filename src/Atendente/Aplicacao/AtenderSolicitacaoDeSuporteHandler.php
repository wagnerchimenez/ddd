<?php

declare(strict_types=1);

namespace SuporteInformatica\Atendente\Aplicacao;

use SuporteInformatica\Atendente\Dominio\AtendenteRepositorio;
use SuporteInformatica\Atendente\Dominio\Excecao\AtendenteNaoEncontradoExcecao;
use SuporteInformatica\Suporte\Dominio\Excecao\SolicitacaoDeSuporteNaoEncontradaExcecao;
use SuporteInformatica\Suporte\Dominio\SuporteRepositorio;

class AtenderSolicitacaoDeSuporteHandler
{

    private AtendenteRepositorio $atendenteRepositorio;
    private SuporteRepositorio $suporteRepositorio;

    public function __construct(
        AtendenteRepositorio $atendenteRepositorio,
        SuporteRepositorio $suporteRepositorio
    ) {
        $this->atendenteRepositorio = $atendenteRepositorio;
        $this->suporteRepositorio = $suporteRepositorio;
    }

    public function executar(AtenderSolicitacaoDeSuporte $command): void
    {
        $atendente = $this->atendenteRepositorio->buscarPorId($command->atendenteId);

        if ($atendente === null) {
            throw new AtendenteNaoEncontradoExcecao();
        }

        $suporte = $this->suporteRepositorio->buscarPorId($command->suporteId);

        if ($suporte === null) {
            throw new SolicitacaoDeSuporteNaoEncontradaExcecao();
        }

        $suporte->realizarAtendimento($atendente->id());

        $this->suporteRepositorio->salvar($suporte);
    }
}
