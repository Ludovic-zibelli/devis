<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class Devis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Date()
     *
     * @ORM\Column(name="date",type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="contexte", type="string")
     */
    private $contexte;

    /**
     * @var array
     *
     * @ORM\Column(name="type", type="array")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau_graphisme", type="string")
     */
    private $niveauGraphisme;

    /**
     * @var boolean
     *
     * @ORM\Column(name="logo", type="boolean")
     */
    private $logo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="charte_graphique", type="boolean")
     */
    private $charteGraphique;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_page", type="integer")
     */
    private $nbPage;

    /**
     * @var array
     *
     * @ORM\Column(name="langue", type="array")
     */
    private $langue;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actualites", type="boolean")
     */
    private $actualites;

    /**
     * @var boolean
     *
     *@ORM\Column(name="blog", type="boolean")
     */
    private $blog;

    /**
     * @var boolean
     *
     *@ORM\Column(name="emailing", type="boolean")
     */
    private $emailing;

    /**
     * @var integer
     *
     * @ORM\Column(name="form", type="integer")
     */
    private $form;

    /**
     * @var boolean
     *
     * @ORM\Column(name="espace_membre", type="boolean")
     */
    private $espaceMembre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="forum", type="boolean")
     */
    private $forum;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gmaps", type="boolean")
     */
    private $gMaps;

    /**
     * @var integer
     *
     * @ORM\Column(name="image", type="integer")
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="video", type="integer")
     */
    private $video;

    /**
     * @var array
     *
     * @ORM\Column(name="hebergeur_video", type="array")
     */
    private $hebergeurVideo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gmaps", type="boolean")
     */
    private $domaine;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gestion", type="boolean")
     */
    private $gestion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="suivi_stats", type="boolean")
     */
    private $suiviStats;

    /**
     * @var boolean
     *
     * @ORM\Column(name="assistance", type="boolean")
     */
    private $assistance;

    /**
     * @var array
     *
     * @ORM\Column(name="marketing_digital", type="array")
     */
    private $marketingDigital;

    /**
     * @var array
     *
     * @ORM\Column(name="maturite_projet", type="array")
     */
    private $maturiteProjet;

    /**
     * @var array
     *
     * @ORM\Column(name="client", type="array")
     */
    private $client;

    /**
     * @var string
     *
     *@Assert\Type(
     *     type="alpha",
     *     message="Ceci '{{ value }}' n'est pas un {{ type }}."
     * )
     *
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Le champs est limité à {{ limit }} charactères"
     * )
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     *@Assert\Type(
     *     type="alpha",
     *     message="Ceci '{{ value }}' n'est pas un {{ type }}."
     * )
     *
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Le champs est limité à {{ limit }} charactères"
     * )
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     *
     * @Assert\Email(
     *     message = "Cet Email '{{ value }}' n'est pas valide",
     *     checkMX = true
     *     )
     */
    private $email;

    /**
     * @var array
     *
     * @ORM\Column(name="raison_social", type="array")
     */
    private $raisonSocial;

    /**
     * @var boolean
     *
     * @ORM\Column(name="optin", type="boolean")
     */
    private $optin;

    /**
     * @var string
     *
     * @Assert\Length(
     *      max = 10,
     *      maxMessage = "Le champs est limité à {{ limit }} charactères"
     * )
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    /**
     * @Assert\Date()
     *
     * @ORM\Column(name="calendrier", type="date")
     */
    private $calendrier;
}