<?php

declare(strict_types=1);

namespace SuporteInformatica\Cliente\Dominio;

interface ClienteRepositorio
{
    public function buscarPorId(int $id): ?Cliente;
    public function salvar(Cliente $cliente): void;
}
