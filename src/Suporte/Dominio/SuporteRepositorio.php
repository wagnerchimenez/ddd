<?php

declare(strict_types=1);

namespace SuporteInformatica\Suporte\Dominio;

interface SuporteRepositorio
{
    public function buscarPorCliente(int $clienteId): ?Suporte;
    public function salvar(Suporte $suporte): void;
}
