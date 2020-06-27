<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('type', TextType::class)
            ->add('customer', TextType::class)
            ->add('object', TextType::class)
            ->add('submit', SubmitType::class, [
                'label' => "New task"

                ]
            )

        ;

    }
}