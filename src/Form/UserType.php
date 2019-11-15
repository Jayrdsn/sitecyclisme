<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Niveau;
use App\Entity\Discipline;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('password')
     //       ->add('roles')
            ->add('idDiscipline', EntityType::class,
                array('class' => 'App\Entity\Discipline',
                    'label' => 'Discipline :',
                    'choice_label' => function($idDiscipline){
                        return $idDiscipline->getLibelle();

                    },))
            ->add('adresse' , AdresseType::class )
            ->add('idNiveau', EntityType::class,
                array('class' => 'App\Entity\Niveau',
                 'label' => 'Niveau :',
                'choice_label' => function($idNiveau){
                    return $idNiveau->getNiveau();

                },))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
