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
                    'Une création de site' => 'creation',
                    'Une refonte de site' => 'refonte',
                ],
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Un site vitrine' => 'vitrine',
                    'Un site marchand E-Commerce' => 'e-commerce',
                    'Un blog d\'entreprise' => 'blog',
                ],
                'required' => true,
                'help' => 'Un site vitrine est ..., un site e-commerce est ... et un Blog fait ...',
            ])
            ->add('elementsGraphiques', ChoiceType::class, [
                'choices'  => [
                    'Aucun' => 'aucun',
                    'Zoning' => 'zoning',
                    'Maquettes ou Mock-up' => 'mock-up',
                ],
                'help' => 'Le zoning est ... et la maquette ...',
            ])
            ->add('niveauGraphisme', ChoiceType::class, [
                'choices'  => [
                    'A partir d\'un modèle' => 'normal',
                    'Sur-mesure' => 'sur-mesure',
                ],
            ])
            ->add('logo', ChoiceType::class, [
                'choices' => [
                    'Non, j\'ai déjà un logo et je souhaite l\'utiliser' => false,
                    'Oui' => true,
                ],
                'required' => true,
                'multiple' => false,
            ])
            ->add('charteGraphique', ChoiceType::class, [
                'choices' => [
                    'Non, j\'ai déjà une charte et je souhaite l\'utiliser' => false,
                    'Oui' => true,
                ],
                'required' => true,
                'multiple' => false,
            ])
            ->add('nombrePage', IntegerType::class, [
                'attr' => [
                'min' => 1,
                'max' => 100
             ]
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
            ->add('formulaire', IntegerType::class, [
                'attr' => [
                'min' => 0,
                'max' => 20
            ]
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
            ->add('image', IntegerType::class, [
                'attr' => [
                'min' => 0,
                'max' => 1000
            ]
            ])
            ->add('video', IntegerType::class, [
                'attr' => [
                'min' => 0,
                'max' => 50
            ]
            ])
            ->add('hebergeurVideo', ChoiceType::class, [
                'choices'  => [
                    'Youtube' => 'youtube',
                    'Vimeo' => 'vimeo',
                    'Dailymotion' => 'dailymotion',
                ],
                'expanded'  => true,
                'multiple'  => true,
                'required' => false,
            ])
            ->add('domaine', ChoiceType::class, [
                'choices' => [
                    'Non, j\'ai déjà un nom de domaine' => false,
                    'Oui, je souhaite prendre un nom de domaine' => true,
                ],
                'required' => true,
                'multiple' => false,
            ])
            ->add('gestion', ChoiceType::class, [
                'choices' => [
                    'Non, j\'ai déja un prestataire pour l\'hébergement' => false,
                    'Oui, je souhaite faire héberger mon site' => true,
                ],
                'required' => true,
                'multiple' => false,
            ])
            ->add('suiviStats', CheckboxType::class, [
                'label'    => 'Rapport mensuel de suivi des stats',
                'required' => false,
            ])
            ->add('assistance', ChoiceType::class, [
                'choices' => [
                    'Non' => false,
                    'Oui' => true,
                ],
                'required' => true,
                'multiple' => false,
            ])
            ->add('marketingDigital', ChoiceType::class, [
                'choices'  => [
                    'Aucune' => 'aucun',
                    'Accompagnement réseaux sociaux' => 'res_soc',
                    'Référencement naturel' => 'ref_nat',
                    'Accompagnement rédaction web' => 'redac',
                    'Campagnes de marketing en ligne' => 'campagne',
                ],
                'expanded'  => true,
                'multiple'  => true,
                'required' => false
            ])
            ->add('maturiteProjet', ChoiceType::class, [
                'choices'  => [
                    'Je n\'ai pas encore de devis' => 'pas',
                    'J\'ai déjà un ou plusieurs devis' => 'devis',
                    'Je damande un devis par curiosité' => 'curiosite',
                ],
            ])
            ->add('client', ChoiceType::class, [
                'choices'  => [
                    'Particulier' => 'particulier',
                    'Entreprise' => 'entreprise',
                    'Association' => 'association',
                    'Administration' => 'administration',
                ]])
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('email', EmailType::class)
            ->add('raisonSocial', TextType::class, ['required' => false])
            ->add('optin', CheckboxType::class, [
                'label'    => 'Je m\'abonne à la newsletter Digital User',
                'required' => false,
            ])
            ->add('telephone', TelType::class, ['required' => false])
            ->add('rgpd', CheckboxType::class)
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