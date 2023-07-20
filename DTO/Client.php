<?php
// Client.php

declare(strict_types=1);

class Client
{
    // Déclaration des attributs
    private int $idClient;
    private string $nomClient;
    private string $prenomClient;
    private string $adresseClient;
    private string $dateNaissanceClient;
    private string $cpClient;
    private string $emailClient;
    private string $mdpClient;
    private string $telephoneClient;
    private string $paysClient;
    private string $villeClient;

    // Constructeur / Déclaration des méthodes
    public function __construct(int $idClient = 0, string $nomClient = "", string $prenomClient = "", string $adresseClient = "", string $dateNaissanceClient = "", string $cpClient = "", string $emailClient = "", string $mdpClient = "", string $telephoneClient = "", string $paysClient = "", string $villeClient = "")
    {
        $this->idClient = $idClient;
        $this->nomClient = $nomClient;
        $this->prenomClient = $prenomClient;
        $this->adresseClient = $adresseClient;
        $this->dateNaissanceClient = $dateNaissanceClient;
        $this->cpClient = $cpClient;
        $this->emailClient = $emailClient;
        $this->mdpClient = $mdpClient;
        $this->telephoneClient = $telephoneClient;
        $this->paysClient = $paysClient;
        $this->villeClient = $villeClient;
    }

    // Setter / Getter
    public function setIdClient(int $idClient): void
    {
        $this->idClient = $idClient;
    }

    public function getIdClient(): int
    {
        return $this->idClient;
    }

    public function setNomClient(string $nomClient): void
    {
        $this->nomClient = $nomClient;
    }

    public function getNomClient(): string
    {
        return $this->nomClient;
    }

    public function setPrenomClient(string $prenomClient): void
    {
        $this->prenomClient = $prenomClient;
    }

    public function getPrenomClient(): string
    {
        return $this->prenomClient;
    }

    public function setAdresseClient(string $adresseClient): void
    {
        $this->adresseClient = $adresseClient;
    }

    public function getAdresseClient(): string
    {
        return $this->adresseClient;
    }

    public function setDateNaissanceClient(string $dateNaissanceClient): void
    {
        $this->dateNaissanceClient = $dateNaissanceClient;
    }

    public function getDateNaissanceClient(): string
    {
        return $this->dateNaissanceClient;
    }

    public function setCpClient(string $cpClient): void
    {
        $this->cpClient = $cpClient;
    }

    public function getCpClient(): string
    {
        return $this->cpClient;
    }

    public function setEmailClient(string $emailClient): void
    {
        $this->emailClient = $emailClient;
    }

    public function getEmailClient(): string
    {
        return $this->emailClient;
    }

    public function setMdpClient(string $mdpClient): void
    {
        $this->mdpClient = $mdpClient;
    }

    public function getMdpClient(): string
    {
        return $this->mdpClient;
    }

    public function setTelephoneClient(string $telephoneClient): void
    {
        $this->telephoneClient = $telephoneClient;
    }

    public function getTelephoneClient(): string
    {
        return $this->telephoneClient;
    }

    public function setPaysClient(string $paysClient): void
    {
        $this->paysClient = $paysClient;
    }

    public function getPaysClient(): string
    {
        return $this->paysClient;
    }

    public function setVilleClient(string $villeClient): void
    {
        $this->villeClient = $villeClient;
    }

    public function getVilleClient(): string
    {
        return $this->villeClient;
    }
}

?>