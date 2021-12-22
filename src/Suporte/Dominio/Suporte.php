<?php

declare(strict_types=1);

namespace SuporteInformatica\Suporte\Dominio;

class Suporte
{
    private int $id;
    private int $clienteId;
    private ?int $atendenteId;
    private string $solicitacao;
    private ?array $historico;

    private function __construct(
        int $id,
        int $clienteId,
        ?int $atendenteId,
        string $solicitacao,
        ?array $historico
    ) {
        $this->id = $id;
        $this->clienteId = $clienteId;
        $this->atendenteId = $atendenteId;
        $this->solicitacao = $solicitacao;
        $this->historico = $historico;
    }

    public function clienteId(): int
    {
        return $this->clienteId;
    }

    public static function criarComSolicitacao(
        int $id,
        int $clienteId,
        string $solicitacao
    ): self {
        return new self(
            $id,
            $clienteId,
            null,
            $solicitacao,
            null
        );
    }
}
