<?php

namespace App\Form\Type;

use App\Entity\Estimation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class EstimationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clientId', TextType::class, ['disabled' => true
            ])
            ->add('date', DateType::class, ['disabled' => true
            ])
            ->add('contexte', ChoiceType::class, [
                'choices'  => [
                    'Création' => 'creation',
                    'Refonte' => 'refonte',
                ],
                'label' => 'Contexte du projet',
                'required' => true,
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Vitrine' => 'vitrine',
                    'E-commerce' => 'e-commerce',
                    'Blog' => 'blog',
                ],
                'required' => true,
                'help' => 'Un site vitrine est ..., un site e-commerce est ... et un Blog fait ...',
                'label' => 'Type de site web',
                'expanded'  => true,
                'multiple'  => true,
            ])
            ->add('elementsGraphiques', ChoiceType::class, [
                'choices'  => [
                    'Aucun' => 'aucun',
                    'Zoning' => 'zoning',
                    'Maquette' => 'maquette',
                ],
                'required' => true,
                'help' => 'Le zoning est ... et la maquette ...',
                'label' => 'Éléments de graphisme fournis par le commanditaire',
            ])
            ->add('niveauGraphisme', ChoiceType::class, [
                'choices'  => [
                    'Normal' => 'normal',
                    'Sur-mesure' => 'sur-mesure',
                ],
                'required' => true,
                'label' => 'Niveau de graphisme souhaité',
            ])
            ->add('logo', CheckboxType::class, [
                'label'    => 'Création de logo',
                'required' => false,
            ])
            ->add('charteGraphique', CheckboxType::class, [
                'label'    => 'Création de charte graphique',
                'required' => false,
            ])
            ->add('nombrePage', IntegerType::class, ['attr' => [
                'min' => 1,
                'max' => 100
             ],
                'data' => 1
            ])

            ->add('langue', ChoiceType::class, [
                'choices' => [
                    'Allemand' => 'de',
                    'Anglais' => 'en',
                    'Arabe' => 'ar',
                    'Espagnol'   => 'es',
                    'Français' => 'fr',
                    'Italien' => 'it',
                    'Mandarin' => 'zh',
                    'Portugais' => 'pt',
                ],
                'data' => ['fr'],
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('actualites', CheckboxType::class, [
                'label'    => 'Page actualités',
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
            ->add('formulaire', IntegerType::class, ['attr' => [
                'min' => 0,
                'max' => 20
            ],
                'data' => 0
            ])
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
            ->add('image', IntegerType::class, ['attr' => [
                'min' => 0,
                'max' => 1000
            ],
                'data' => 0
            ])
            ->add('video', IntegerType::class, ['attr' => [
                'min' => 0,
                'max' => 50
            ],
                'data' => 0
            ])
            ->add('hebergeurVideo', ChoiceType::class, [
                'choices'  => [
                    'Youtube' => 'youtube',
                    'Vimeo' => 'vimeo',
                    'Dailymotion' => 'dailymotion',
                ],
                'label'    => 'Hébergeur video',
                'expanded'  => true,
                'multiple'  => true,
            ])
            ->add('domaine', CheckboxType::class, [
                'label'    => 'Dépôt du domaines par notre équipe',
                'required' => false,
            ])
            ->add('gestion', CheckboxType::class, [
                'label'    => 'Gestion de l\'hébergement par notre équipe',
                'required' => false,
            ])
            ->add('suiviStats', CheckboxType::class, [
                'label'    => 'Rapport mensuel de suivi des stats',
                'required' => false,
            ])
            ->add('assistance', CheckboxType::class, [
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
                    'a déjà des devis' => 'a des devis',
                    'n\'a pas encore de devis' => 'pas de devis',
                    'par curiosité' => 'par curiosite',
                ],
            ])
            ->add('client', ChoiceType::class, [
                'choices'  => [
                    'Particulier' => 'particulier',
                    'Association' => 'association',
                    'Administration' => 'administration',
                    'Entreprise' => 'entreprise',
                ],
                'required' => true,
            ])
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('email', EmailType::class)
            ->add('raisonSocial', TextType::class, ['required' => false])
            ->add('optin', CheckboxType::class, [
                'label'    => 'newsletter',
                'required' => false,
            ])
            ->add('telephone', TelType::class)
            ->add('rgpd', CheckboxType::class)
            ->add('valide', CheckboxType::class, ['disabled' => true,
            ])
            ->add('save', SubmitType::class, ['label' => 'Valider'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Estimation::class,
        ]);
    }
}