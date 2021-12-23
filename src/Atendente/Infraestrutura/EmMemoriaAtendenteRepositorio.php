<?php

declare(strict_types=1);

namespace SuporteInformatica\Atendente\Infraestrutura;

use SuporteInformatica\Atendente\Dominio\Atendente;
use SuporteInformatica\Atendente\Dominio\AtendenteRepositorio;

class EmMemoriaAtendenteRepositorio implements AtendenteRepositorio
{
    private array $atendentes;

    public function __construct(array $atendentes = [])
    {
        $this->atendentes = $atendentes;
    }

    public function buscarPorId(int $atendenteId): ?Atendente
    {
        foreach ($this->atendentes as $atendente) {
            if ($atendente->id() === $atendenteId) {
                return $atendente;
            }
        }

        return null;
    }
}
