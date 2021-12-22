<?php

declare(strict_types=1);

namespace SuporteInformatica\Suporte\Aplicacao;

class SolicitarSuporte
{
    public int $suporteId;
    public int $clienteId;
    public string $solicitacao;

    public function __construct(
        int $suporteId,
        int $clienteId,
        string $solicitacao
    ) {
        $this->suporteId = $suporteId;
        $this->clienteId = $clienteId;
        $this->solicitacao = $solicitacao;
    }
}
