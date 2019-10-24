<?php

namespace App\Form;

use App\Entity\Adresse;
use App\Form\AdresseType;
use App\Entity\Evenement;
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
            ->add('idDiscipline', EntityType::class,
                array('class' => 'App\Entity\Discipline',
                    'label' => 'Discipline :',
                    'choice_label' => function($idDiscipline){
                        return $idDiscipline->getLibelle();

                    },))

            ->add('adresse' , AdresseType::class );

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
