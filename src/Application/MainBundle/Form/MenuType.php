<?php

namespace Application\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MenuType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('parent', 'entity', array(
                    'required' => false,
                    'label' => 'Parent Menu',
                    'class' => 'ApplicationMainBundle:Menu',
                    'empty_value' => 'Choose parent menu',
                ))
                ->add('title', null, array(
                    'label' => 'Title',
                    'constraints' => array(
                        new \Symfony\Component\Validator\Constraints\NotBlank()
                    )
                ))
                ->add('color', 'choice', array(
                    'label' => 'Color',
                    'required' => false,
                    'empty_value' => 'Choose color',
                    'choices' => \Application\MainBundle\Form\Type\ColorType::$choices,
                    'constraints' => array(
                        new \Symfony\Component\Validator\Constraints\NotBlank()
                    )
                ))
                ->add('save', 'submit', array(
                    'attr' => array('class' => 'btn btn-success')
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\MainBundle\Entity\Menu'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'application_mainbundle_menu';
    }

}
