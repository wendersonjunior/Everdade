<?php

namespace App\Model\MySQL\Everdade;

final class JfModel
{
    
    private $idJf;
    private $nome;
    private $tempoMaxExib;
    private $status;

    public function getIdJf(): int
    {
        return $this->idJf;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getTempoMaxExib(): string
    {
        return $this->tempoMaxExib;
    }
    public function setTempoMaxExib(string $tempoMaxExib): void
    {
        $this->tempoMaxExib = $tempoMaxExib;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

}
