<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EstimationRepository")
 */
class Estimation
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $clientId;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contexte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $elementsGraphiques;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveauGraphisme;

    /**
     * @ORM\Column(type="boolean")
     */
    private $logo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $charteGraphique;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombrePage;

    /**
     * @ORM\Column(type="array")
     */
    private $langue = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $actualites;

    /**
     * @ORM\Column(type="boolean")
     */
    private $blog;

    /**
     * @ORM\Column(type="boolean")
     */
    private $emailing;

    /**
     * @ORM\Column(type="integer")
     */
    private $formulaire;

    /**
     * @ORM\Column(type="boolean")
     */
    private $espaceMembre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $forum;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gmaps;

    /**
     * @ORM\Column(type="integer")
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     */
    private $video;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $hebergeurVideo = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $domaine;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gestion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $suiviStats;

    /**
     * @ORM\Column(type="boolean")
     */
    private $assistance;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $marketingDigital = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $maturiteProjet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $client;

    /**
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Le champs est limité à {{ limit }} charactères"
     * )
     *
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Le champs est limité à {{ limit }} charactères"
     * )
     *
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @Assert\Email(
     *     message = "Cet Email '{{ value }}' n'est pas valide",
     *     checkMX = true
     *     )
     *
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $raisonSocial;

    /**
     * @ORM\Column(type="boolean")
     */
    private $optin;

    /**
     * @ORM\Column(type="integer", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="boolean")
     */
    private $rgpd;

    /** GETTTER & SETTER **/

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getContexte(): ?string
    {
        return $this->contexte;
    }

    public function setContexte(string $contexte): self
    {
        $this->contexte = $contexte;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getElementsGraphiques(): ?string
    {
        return $this->elementsGraphiques;
    }

    public function setElementsGraphiques(string $elementsGraphiques): self
    {
        $this->elementsGraphiques = $elementsGraphiques;

        return $this;
    }

    public function getNiveauGraphisme(): ?string
    {
        return $this->niveauGraphisme;
    }

    public function setNiveauGraphisme(string $niveauGraphisme): self
    {
        $this->niveauGraphisme = $niveauGraphisme;

        return $this;
    }

    public function getLogo(): ?bool
    {
        return $this->logo;
    }

    public function setLogo(bool $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getCharteGraphique(): ?bool
    {
        return $this->charteGraphique;
    }

    public function setCharteGraphique(bool $charteGraphique): self
    {
        $this->charteGraphique = $charteGraphique;

        return $this;
    }

    public function getNombrePage(): ?int
    {
        return $this->nombrePage;
    }

    public function setNombrePage(int $nombrePage): self
    {
        $this->nombrePage = $nombrePage;

        return $this;
    }

    public function getLangue(): ?array
    {
        return $this->langue;
    }

    public function setLangue(array $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getActualites(): ?bool
    {
        return $this->actualites;
    }

    public function setActualites(bool $actualites): self
    {
        $this->actualites = $actualites;

        return $this;
    }

    public function getBlog(): ?bool
    {
        return $this->blog;
    }

    public function setBlog(bool $blog): self
    {
        $this->blog = $blog;

        return $this;
    }

    public function getEmailing(): ?bool
    {
        return $this->emailing;
    }

    public function setEmailing(bool $emailing): self
    {
        $this->emailing = $emailing;

        return $this;
    }

    public function getFormulaire(): ?int
    {
        return $this->formulaire;
    }

    public function setFormulaire(int $formulaire): self
    {
        $this->formulaire = $formulaire;

        return $this;
    }

    public function getEspaceMembre(): ?bool
    {
        return $this->espaceMembre;
    }

    public function setEspaceMembre(bool $espaceMembre): self
    {
        $this->espaceMembre = $espaceMembre;

        return $this;
    }

    public function getForum(): ?bool
    {
        return $this->forum;
    }

    public function setForum(bool $forum): self
    {
        $this->forum = $forum;

        return $this;
    }

    public function getGmaps(): ?bool
    {
        return $this->gmaps;
    }

    public function setGmaps(bool $gmaps): self
    {
        $this->gmaps = $gmaps;

        return $this;
    }

    public function getImage(): ?int
    {
        return $this->image;
    }

    public function setImage(int $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getVideo(): ?int
    {
        return $this->video;
    }

    public function setVideo(int $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getHebergeurVideo(): ?array
    {
        return $this->hebergeurVideo;
    }

    public function setHebergeurVideo(?array $hebergeurVideo): self
    {
        $this->hebergeurVideo = $hebergeurVideo;

        return $this;
    }

    public function getDomaine(): ?bool
    {
        return $this->domaine;
    }

    public function setDomaine(bool $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getGestion(): ?bool
    {
        return $this->gestion;
    }

    public function setGestion(bool $gestion): self
    {
        $this->gestion = $gestion;

        return $this;
    }

    public function getSuiviStats(): ?bool
    {
        return $this->suiviStats;
    }

    public function setSuiviStats(bool $suiviStats): self
    {
        $this->suiviStats = $suiviStats;

        return $this;
    }

    public function getAssistance(): ?bool
    {
        return $this->assistance;
    }

    public function setAssistance(bool $assistance): self
    {
        $this->assistance = $assistance;

        return $this;
    }

    public function getMarketingDigital(): ?array
    {
        return $this->marketingDigital;
    }

    public function setMarketingDigital(?array $marketingDigital): self
    {
        $this->marketingDigital = $marketingDigital;

        return $this;
    }

    public function getMaturiteProjet(): ?string
    {
        return $this->maturiteProjet;
    }

    public function setMaturiteProjet(string $maturiteProjet): self
    {
        $this->maturiteProjet = $maturiteProjet;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(string $client): self
    {
        $this->client = $client;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getOptin(): ?bool
    {
        return $this->optin;
    }

    public function setOptin(bool $optin): self
    {
        $this->optin = $optin;

        return $this;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial(?string $raisonSocial): self
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

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

//Toutes les valeurs sont en heures sauf indication contraire.
    public function calcul()
    {
        //$tauxHoraire est en Euros.
        $tauxHoraire = 31.59;
            if ($this->getType() === 'e-commerce') {
                $type = 50;
            } else $type = 0;
            if ($this->getNiveauGraphisme() === 'normal') {
                $graphisme = 20;
            } else $graphisme = 50;
            $nbPage = $this->getNombrePage() * 15;
            $langue = count($this->getLangue()) * 20;
            if ($this->getLogo() === true) {
                $logo = 30;
            }else $logo = 0;
            if ($this->getCharteGraphique() === true) {
                $charte = 30;
            }else $charte = 0;
            if ($this->getActualites() === true) {
                $actualites = 20;
            }else $actualites = 0;
            if ($this->getBlog() === true) {
                $blog = 20;
            }else $blog = 0;
            if ($this->getEmailing() === true) {
                $emailing = 20;
            }else $emailing = 0;
            $form = $this->getFormulaire() * 20;
            if ($this->getEspaceMembre() === true) {
                $espaceMembre = 30;
            }else $espaceMembre = 0;
            if ($this->getForum() === true) {
                $forum = 10;
            }else $forum = 0;
            if ($this->getGmaps() === true) {
                $gmaps = 5;
            }else $gmaps = 0;
            $image = $this->getImage() * 0.25;
            $video = $this->getVideo() * 0.25;
            //$domaine est en Euros
            if ($this->getDomaine() === true) {
                $domaine = 100;
            }else $domaine = 0;
            if ($this->getGestion() === true) {
                $gestion = 20;
            }else $gestion = 0;
            if ($this->getSuiviStats() === true) {
                $suiviStats = 2;
            }else $suiviStats = 0;
            if ($this->getAssistance() === true) {
                $assistance = 10;
            }else $assistance = 0;
            $market = count($this->getMarketingDigital()) * 20;

            //Le calcul est fait de cette maniere : ((Heures additionnés)multiplié par $tauxHoraire)enfin on ajoute $domaine
            $total = (($type + $graphisme + $nbPage + $langue + $logo + $charte + $actualites + $blog + $emailing + $form + $espaceMembre + $forum + $gmaps + $image + $video + $gestion + $suiviStats + $assistance + $market) * $tauxHoraire) + $domaine;
            return round($total, 0);
    }
}