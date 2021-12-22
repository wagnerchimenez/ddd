<?php

declare(strict_types=1);

namespace SuporteInformatica\Cliente\Infraestrutura;

use SuporteInformatica\Cliente\Dominio\Cliente;
use SuporteInformatica\Cliente\Dominio\ClienteRepositorio;

class EmMemoriaClienteRepositorio implements ClienteRepositorio
{
    private array $clientes;

    public function __construct(array $clientes = [])
    {
        $this->clientes = $clientes;
    }

    public function buscarPorId(int $id): ?Cliente
    {
        foreach ($this->clientes as $cliente) {
            if ($cliente->id() === $id) {
                return $cliente;
            }
        }

        return null;
    }

    public function salvar(Cliente $cliente): void
    {
        $this->clientes[] = $cliente;
    }
}
