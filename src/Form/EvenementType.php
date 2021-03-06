<?php

namespace App\Form;

use App\Entity\Adresse;
use App\Form\AdresseType;
use App\Entity\Evenement;
use App\Entity\Nivdisci;
use Doctrine\ORM\EntityRepository;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('idNivdisci', EntityType::class,[
                'class' => Nivdisci::class,
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('nivdisci')
                ->orderBy('nivdisci.idDiscipline', 'ASC');
            },
            ])
            ->add('adresse' , AdresseType::class );

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
