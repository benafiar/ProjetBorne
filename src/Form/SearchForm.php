<?php

namespace App\Form;

use App\Entity\Admin;
use App\Data\SearchData;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('categorie', EntityType::class, [
                'label'=>false,
                'required'=>false,
                'class'=> Categorie::class,
                'expanded'=>true,
                'multiple'=>true,
               
            ])
      
            ->add('promo', CheckboxType::class, [
                'label'=>'En promotion',
                'required'=>false, 
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' =>'GET',
            'csrf_protection'=> false

        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
    
}




