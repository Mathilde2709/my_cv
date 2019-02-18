<?php

namespace App\Form;

use App\Entity\Loisirs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LoisirsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('subject')
            ->add('competences')
            ->add('save', SubmitType ::class, [
                'attr' => ['class' => 'save'],
                ])
            ->add('remove', SubmitType::class,['attr' => ['class' => 'remove'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Loisirs::class,
        ]);
    }
}
