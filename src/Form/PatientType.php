<?php

namespace App\Form;

use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'attr' => ['class' => 'form-control']
        ])
        ->add('prenom', TextType::class, [
            'label' => 'Prénom',
            'attr' => ['class' => 'form-control']
        ])
        ->add('adresse', TextType::class, [
            'label' => 'Adresse',
            'attr' => ['class' => 'form-control']
        ])
        ->add('complement_adresse', TextType::class, [
            'label' => 'Complément Adresse',
            'required' => false,
            'attr' => ['class' => 'form-control']
        ])
        ->add('code_postal', TextType::class, [
            'label' => 'Code Postal',
            'attr' => ['class' => 'form-control']
        ])
        ->add('ville', TextType::class, [
            'label' => 'Ville',
            'attr' => ['class' => 'form-control']
        ])
        ->add('telephone', TextType::class, [
            'label' => 'Téléphone',
            'attr' => ['class' => 'form-control']
        ])
        ->add('mdp', PasswordType::class, [
            'label' => 'Mot de passe',
            'attr' => ['class' => 'form-control']
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'attr' => ['class' => 'form-control']
        ])
            ->add('date_creation')
            ->add('date_fin')
            ->add('droit_utilisateur')
            ->add('save', SubmitType::class, [
                'label' => 'Valider',
                'attr' => ['id' => 'save-button']
 ])
            ->getForm();
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
