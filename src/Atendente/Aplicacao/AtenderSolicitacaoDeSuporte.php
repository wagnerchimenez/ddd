<?php

declare(strict_types=1);

namespace SuporteInformatica\Atendente\Aplicacao;

class AtenderSolicitacaoDeSuporte
{
    public int $suporteId;
    public int $atendenteId;

    public function __construct(
        int $suporteId,
        int $atendenteId
    ) {
        $this->suporteId = $suporteId;
        $this->atendenteId = $atendenteId;
    }
}
