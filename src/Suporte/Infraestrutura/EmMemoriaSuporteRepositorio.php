<?php

declare(strict_types=1);

namespace SuporteInformatica\Suporte\Infraestrutura;

use SuporteInformatica\Suporte\Dominio\Suporte;
use SuporteInformatica\Suporte\Dominio\SuporteRepositorio;

class EmMemoriaSuporteRepositorio implements SuporteRepositorio
{
    private array $suportes;

    public function __construct(array $suportes = [])
    {
        $this->suportes = $suportes;
    }

    public function buscarPorCliente(int $clienteId): ?Suporte
    {
        foreach ($this->suportes as $suporte) {
            if ($suporte->clienteId() === $clienteId) {
                return $suporte;
            }
        }

        return null;
    }

    public function salvar(Suporte $suporte): void
    {
        $this->suportes[] = $suporte;
    }
}
