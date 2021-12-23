<?php

declare(strict_types=1);

namespace SuporteInformatica\Suporte\Dominio;

class Suporte
{
    public const STATUS_EM_ABERTO = 'EM ABERTO';
    public const STATUS_EM_ATENDIMENTO = 'EM ATENDIMENTO';
    public const STATUS_CONCLUIDO = 'CONCLUÍDO';

    private int $id;
    private int $clienteId;
    private ?int $atendenteId;
    private string $solicitacao;
    private ?array $historico;
    private string $status;

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
        $this->status = self::STATUS_EM_ABERTO;
    }

    public static function criarComSolicitacao(
        int $suporteId,
        int $clienteId,
        string $solicitacao
    ): self {
        return new self(
            $suporteId,
            $clienteId,
            null,
            $solicitacao,
            null
        );
    }

    public function id(): int
    {
        return $this->id;
    }

    public function clienteId(): int
    {
        return $this->clienteId;
    }

    public function historico(): ?array
    {
        return $this->historico;
    }

    public function realizarAtendimento(int $atendenteId): void
    {
        $this->atendenteId = $atendenteId;
        $this->status = self::STATUS_EM_ATENDIMENTO;
        $this->historico[] = 'Atendente ' . $atendenteId . ' iniciou atendimento a solicitação ' . $this->id;
    }

    public function concluirAtendimento(): void
    {
        $this->status = self::STATUS_CONCLUIDO;
        $this->historico[] = 'Concluído atendimento';
    }
}
