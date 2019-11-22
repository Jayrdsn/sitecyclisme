<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Niveau;
use App\Entity\Discipline;
use App\Entity\Nivdisci;
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
            ->add('idNivdisci', EntityType::class,
     array('class' => 'App\Entity\Nivdisci',
     'label' => 'Discipline :',
     'choice_label' => function($idNivdisci){
         return $idNivdisci;

     },))
            ->add('adresse' , AdresseType::class )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
