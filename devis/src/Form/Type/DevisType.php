<?php

namespace App\Form\Type;

use App\Entity\Devis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class DevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idClient', IntegerType::class)
            ->add('id', IntegerType::class)
            ->add('date', DateType::class)
            ->add('contexte', ChoiceType::class, [
                'choices'  => [
                    'Création' => 'creation',
                    'Refonte' => 'refonte',
                ],
                'expanded'  => true,
                'multiple'  => false,
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Vitrine' => 'vitrine',
                    'E-commerce' => 'e-commerce',
                    'Blog' => 'blog',
                ],
                'expanded'  => true,
                'multiple'  => true,
            ])
            ->add('elementsGraphiques', ChoiceType::class, [
                'choices'  => [
                    'Aucun' => 'aucun',
                    'Zoning' => 'zoning',
                    'Maquette' => 'maquette',
                ],
                'expanded'  => true,
                'multiple'  => false,
            ])
            ->add('niveauGraphisme', ChoiceType::class, [
                'choices'  => [
                    'Normal' => 'normal',
                    'Sur-mesure' => 'sur-mesure',
                ],
                'expanded'  => true,
                'multiple'  => false,
            ])
            ->add('logo', CheckboxType::class, [
                'label'    => 'Création de logo',
                'required' => false,
            ])
            ->add('charteGraphique', CheckboxType::class, [
                'label'    => 'Création de charte graphique',
                'required' => false,
            ])
            ->add('nombrePage', IntegerType::class)
            ->add('langue', CountryType::class, array('label' => 'Pays', 'preferred_choices' => array('FR')))
            ->add('actualites', CheckboxType::class, [
                'label'    => 'Partie actualités',
                'required' => false,
            ])
            ->add('blog', CheckboxType::class, [
                'label'    => 'Ajout d’un blog',
                'required' => false,
            ])
            ->add('emailing', CheckboxType::class, [
                'label'    => 'Logiciel emailing',
                'required' => false,
            ])
            ->add('formulaire', IntegerType::class)
            ->add('espaceMembre', CheckboxType::class, [
                'label'    => 'Espace membre',
                'required' => false,
            ])
            ->add('forum', CheckboxType::class, [
                'label'    => 'Forum de discussion',
                'required' => false,
            ])
            ->add('gMaps', CheckboxType::class, [
                'label'    => 'Intégration Carte dynamique',
                'required' => false,
            ])
            ->add('image', IntegerType::class)
            ->add('video', IntegerType::class)
            ->add('hebergeurVideo', ChoiceType::class, [
                'choices'  => [
                    'Youtube' => 'youtube',
                    'Vimeo' => 'vimeo',
                    'Dailymotion' => 'dailymotion',
                ],
                'expanded'  => true,
                'multiple'  => true,
            ])
            ->add('domaine', RadioType::class, [
                'label'    => 'Dépôt domaines',
                'required' => false,
            ])
            ->add('gestion', RadioType::class, [
                'label'    => 'Gestion hébergement',
                'required' => false,
            ])
            ->add('suiviStats', RadioType::class, [
                'label'    => 'Rapport mensuel de suivi des stats',
                'required' => false,
            ])
            ->add('assistance', RadioType::class, [
                'label'    => 'Assistance technique mensuelle',
                'required' => false,
            ])
            ->add('marketingDigital', ChoiceType::class, [
                'choices'  => [
                    'Accompagnement réseaux sociaux' => 'youtube',
                    'Référencement naturel' => 'vimeo',
                    'Accompagnement rédaction web' => 'dailymotion',
                    'Campagnes de marketing en ligne' => 'dailymotion',
                ],
                'expanded'  => true,
                'multiple'  => true,
            ])
            ->add('maturiteProjet', ChoiceType::class, [
                'choices'  => [
                    'a déjà des devis' => 'a déjà des devis',
                    'n\’a pas encore de devis' => 'n\’a pas encore de devis',
                    'par curiosité' => 'par curiosité',
                ],
                'expanded'  => true,
                'multiple'  => false,
            ])
            ->add('client', ChoiceType::class, [
                'choices'  => [
                    'Particulier' => 'particulier',
                    'Association' => 'association',
                    'Administration' => 'administration',
                    'Entreprise' => 'entreprise',
                ],
                'expanded'  => true,
                'multiple'  => false,
            ])
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('email', EmailType::class)
            ->add('raisonSocial', TextType::class)
            ->add('optin', CheckboxType::class, [
                'label'    => 'newsletter',
                'required' => false,
            ])
            ->add('telephone', TelType::class)
            ->add('calendrier', DateType::class, array('widget' => 'single_text', 'label' => 'Date de Réservation', 'html5' => false, 'attr' => ['class' => 'js-datepicker'], 'format' => 'dd-MM-yy'))
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => devis::class,
        ]);
    }
}