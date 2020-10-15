<?php


namespace App\Model;


class Book
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $editeur;

    /**
     * @var float
     */
    private $prix;

    /**
     * Book constructor.
     * @param $id
     * @param $nom
     * @param $editeur
     * @param $prix
     */
    public function __construct($id, $nom, $editeur, $prix)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->editeur = $editeur;
        $this->prix = $prix;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getEditeur(): string
    {
        return $this->editeur;
    }

    /**
     * @param string $editeur
     */
    public function setEditeur(string $editeur): void
    {
        $this->editeur = $editeur;
    }

    /**
     * @return float
     */
    public function getPrix(): float
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

}