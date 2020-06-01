<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class FileUploadFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('csvfile', \Symfony\Component\Form\Extension\Core\Type\FileType::class, [
                'mapped' => false,
                'label' => 'UploadFile',
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/csv',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid CSV document',
                     ])
                ],
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_file_upload_form_type';
    }
}
