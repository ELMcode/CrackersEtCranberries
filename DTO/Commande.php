<?php
// Commande.php

declare(strict_types=1);

class Commande
{
    // Déclaration des attributs
    private int $idCommande;
    private int $idClient;
    private int $qteCommande;
    private string $dateCommande;
    private string $statutCommande;
    private int $montantTotalCommande;




    // Constructeur / Déclaration des méthodes

    public function __construct(int $idCommande = 0, int $idClient = 0, int $qteCommande = 0, string $dateCommande = "", string $statutCommande = "", int $montantTotalCommande = 0)
    {
        $this->idCommande = $idCommande;
        $this->idClient = $idClient;
        $this->qteCommande = $qteCommande;
        $this->dateCommande = $dateCommande;
        $this->statutCommande = $statutCommande;
        $this->montantTotalCommande = $montantTotalCommande;
    }

    // Setter / Getter

    public function setIdCommande(int $idCommande): void
    {
        $this->idCommande = $idCommande;
    }
    public function getIdCommande(): int
    {
        return $this->idCommande;
    }

    public function setIdClient(int $idClient): void
    {
        $this->idClient = $idClient;
    }
    public function getIdClient(): int
    {
        return $this->idClient;
    }

    public function setQteCommande(int $qteCommande): void
    {
        $this->qteCommande = $qteCommande;
    }
    public function getQteCommande(): int
    {
        return $this->qteCommande;
    }

    public function setDateCommande(string $dateCommande): void
    {
        $this->dateCommande = $dateCommande;
    }
    public function getDateCommande(): string
    {
        return $this->dateCommande;
    }

    public function setStatutCommande(string $statutCommande): void
    {
        $this->statutCommande = $statutCommande;
    }
    public function getStatutCommande(): string
    {
        return $this->statutCommande;
    }

    public function setMontantTotalCommande(int $montantTotalCommande): void
    {
        $this->montantTotalCommande = $montantTotalCommande;
    }
    public function getMontantTotalCommande(): int
    {
        return $this->montantTotalCommande;
    }

}

?>