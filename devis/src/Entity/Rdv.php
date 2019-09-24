<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RdvRepository")
 */
class Rdv
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\client", inversedBy="rdvs")
     */
    private $id_client;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_rdv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $interlocuteur;

    /**
     * @ORM\Column(type="text")
     */
    private $note_rdv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient(): ?client
    {
        return $this->id_client;
    }

    public function setIdClient(?client $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }

    public function getDateRdv(): ?\DateTimeInterface
    {
        return $this->date_rdv;
    }

    public function setDateRdv(\DateTimeInterface $date_rdv): self
    {
        $this->date_rdv = $date_rdv;

        return $this;
    }

    public function getInterlocuteur(): ?string
    {
        return $this->interlocuteur;
    }

    public function setInterlocuteur(string $interlocuteur): self
    {
        $this->interlocuteur = $interlocuteur;

        return $this;
    }

    public function getNoteRdv(): ?string
    {
        return $this->note_rdv;
    }

    public function setNoteRdv(string $note_rdv): self
    {
        $this->note_rdv = $note_rdv;

        return $this;
    }
}
