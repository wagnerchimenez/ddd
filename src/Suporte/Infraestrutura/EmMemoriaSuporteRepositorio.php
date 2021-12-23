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

    public function buscarPorId(int $suporteId): ?Suporte
    {
        foreach ($this->suportes as $suporte) {
            if ($suporte->id() === $suporteId) {
                return $suporte;
            }
        }

        return null;
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
        foreach ($this->suportes as $chave => &$sup) {
            if ($sup->id() === $suporte->id()) {
                $sup = $suporte;
                return;
            }
        }

        $this->suportes[] = $suporte;
    }
}
