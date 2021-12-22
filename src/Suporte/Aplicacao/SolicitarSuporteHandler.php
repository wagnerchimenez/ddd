<?php

declare(strict_types=1);

namespace SuporteInformatica\Suporte\Aplicacao;

use SuporteInformatica\Cliente\Dominio\ClienteRepositorio;
use SuporteInformatica\Cliente\Dominio\Excecao\ClienteNaoEncontradoExcecao;
use SuporteInformatica\Suporte\Dominio\SolicitacaoDeSuporteInvalidaExcecao;
use SuporteInformatica\Suporte\Dominio\Suporte;
use SuporteInformatica\Suporte\Dominio\SuporteRepositorio;

class SolicitarSuporteHandler
{
    private SuporteRepositorio $suporteRepositorio;
    private ClienteRepositorio $clienteRepositorio;

    public function __construct(
        SuporteRepositorio $suporteRepositorio,
        ClienteRepositorio $clienteRepositorio
    ) {
        $this->suporteRepositorio = $suporteRepositorio;
        $this->clienteRepositorio = $clienteRepositorio;
    }

    public function executar(SolicitarSuporte $command): void
    {
        $cliente = $this->clienteRepositorio->buscarPorId($command->clienteId);

        if ($cliente === null) {
            throw new ClienteNaoEncontradoExcecao();
        }

        if (empty($command->suporteId)) {
            throw new SolicitacaoDeSuporteInvalidaExcecao();
        }

        if (empty($command->solicitacao)) {
            throw new SolicitacaoDeSuporteInvalidaExcecao();
        }

        $suporte = Suporte::criarComSolicitacao(
            $command->suporteId,
            $command->clienteId,
            $command->solicitacao
        );

        $this->suporteRepositorio->salvar($suporte);
    }
}
