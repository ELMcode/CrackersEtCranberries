<?php
// Produit.php

declare(strict_types=1);

class Produit
{
    // Déclaration des attributs
    private int $idProduit;
    private string $nomProduit;
    private int $prixProduit;
    private int $qteStockProduit;
    private string $categorieProduit;
    private string $photoProduit;




    // Constructeur / Déclaration des méthodes

    public function __construct(int $idProduit = 0, string $nomProduit = "", int $prixProduit = 0, int $qteStockProduit = 0, string $categorieProduit = "", string $photoProduit = "")
    {
        $this->idProduit = $idProduit;
        $this->nomProduit = $nomProduit;
        $this->prixProduit = $prixProduit;
        $this->qteStockProduit = $qteStockProduit;
        $this->categorieProduit = $categorieProduit;
        $this->photoProduit = $photoProduit;
    }

    // Setter / Getter

    public function setIdProduit(int $idProduit): void
    {
        $this->idProduit = $idProduit;
    }
    public function getIdProduit(): int
    {
        return $this->idProduit;
    }

    public function setNomProduit(string $nomProduit): void
    {
        $this->nomProduit = $nomProduit;
    }
    public function getNomProduit(): string
    {
        return $this->nomProduit;
    }

    public function setPrixProduit(int $prixProduit): void
    {
        $this->prixProduit = $prixProduit;
    }
    public function getPrixProduit(): int
    {
        return $this->prixProduit;
    }

    public function setQteStockProduit(int $qteStockProduit): void
    {
        $this->prixProduit = $qteStockProduit;
    }
    public function getQteStockProduit(): int
    {
        return $this->qteStockProduit;
    }

    public function setCategorieProduit(int $categorieProduit): void
    {
        $this->prixProduit = $categorieProduit;
    }
    public function getCategorieProduit(): string
    {
        return $this->categorieProduit;
    }

    public function setPhotoProduit(string $photoProduit): void
    {
        $this->photoProduit = $photoProduit;
    }
    public function getPhotoProduit(): string
    {
        return $this->photoProduit;
    }

}

?>