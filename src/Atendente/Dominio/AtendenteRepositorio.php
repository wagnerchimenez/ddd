<?php

declare(strict_types=1);

namespace SuporteInformatica\Atendente\Dominio;

interface AtendenteRepositorio
{
    public function buscarPorId(int $atendenteId): ?Atendente;
}
