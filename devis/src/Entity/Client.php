<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raison_social;

    /**
     * @ORM\Column(type="array")
     */
    private $type_societe = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $newletter;

    /**
     * @ORM\Column(type="boolean")
     */
    private $rgpd;

    /**
     * @ORM\Column(type="text")
     */
    private $remarque;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EMail", mappedBy="id_client")
     */
    private $eMails;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rdv", mappedBy="id_client")
     */
    private $rdvs;

    public function __construct()
    {
        $this->eMails = new ArrayCollection();
        $this->rdvs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->raison_social;
    }

    public function setRaisonSocial(string $raison_social): self
    {
        $this->raison_social = $raison_social;

        return $this;
    }

    public function getTypeSociete(): ?array
    {
        return $this->type_societe;
    }

    public function setTypeSociete(array $type_societe): self
    {
        $this->type_societe = $type_societe;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumeroTelephone(): ?int
    {
        return $this->numero_telephone;
    }

    public function setNumeroTelephone(int $numero_telephone): self
    {
        $this->numero_telephone = $numero_telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNewletter(): ?bool
    {
        return $this->newletter;
    }

    public function setNewletter(bool $newletter): self
    {
        $this->newletter = $newletter;

        return $this;
    }

    public function getRgpd(): ?bool
    {
        return $this->rgpd;
    }

    public function setRgpd(bool $rgpd): self
    {
        $this->rgpd = $rgpd;

        return $this;
    }

    public function getRemarque(): ?string
    {
        return $this->remarque;
    }

    public function setRemarque(string $remarque): self
    {
        $this->remarque = $remarque;

        return $this;
    }

    /**
     * @return Collection|EMail[]
     */
    public function getEMails(): Collection
    {
        return $this->eMails;
    }

    public function addEMail(EMail $eMail): self
    {
        if (!$this->eMails->contains($eMail)) {
            $this->eMails[] = $eMail;
            $eMail->setIdClient($this);
        }

        return $this;
    }

    public function removeEMail(EMail $eMail): self
    {
        if ($this->eMails->contains($eMail)) {
            $this->eMails->removeElement($eMail);
            // set the owning side to null (unless already changed)
            if ($eMail->getIdClient() === $this) {
                $eMail->setIdClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rdv[]
     */
    public function getRdvs(): Collection
    {
        return $this->rdvs;
    }

    public function addRdv(Rdv $rdv): self
    {
        if (!$this->rdvs->contains($rdv)) {
            $this->rdvs[] = $rdv;
            $rdv->setIdClient($this);
        }

        return $this;
    }

    public function removeRdv(Rdv $rdv): self
    {
        if ($this->rdvs->contains($rdv)) {
            $this->rdvs->removeElement($rdv);
            // set the owning side to null (unless already changed)
            if ($rdv->getIdClient() === $this) {
                $rdv->setIdClient(null);
            }
        }

        return $this;
    }
}
