<?php

 namespace AppBundle\Form;

 use Symfony\Component\Form\FormBuilderInterface;
 use Symfony\Component\OptionsResolver\OptionsResolverInterface;
 use Symfony\Component\OptionsResolver\OptionsResolver;
 use Symfony\Component\Form\AbstractType;
 use AppBundle\Entity\User;

 //use FOS\UserBundle\Form\Type\ResettingFormType as BaseType;

 class FormReinitMdp extends AbstractType
 {
    private $class;

    /**
     * @param string $class The User class name
     */
    /*public function __construct($class)
    {
        $this->class = $class;
    }*/

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*if (class_exists('Symfony\Component\Security\Core\Validator\Constraints\UserPassword')) {
            $constraint = new UserPassword();
        } else {
            // Symfony 2.1 support with the old constraint class
            $constraint = new OldUserPassword();
        }

        $builder->add('current_password', 'password', array(
            'label' => 'actuelle',
            'translation_domain' => 'FOSUserBundle',
            'mapped' => false,
            'constraints' => $constraint,
        ));
        $builder->add('plainPassword', 'repeated', array(
            'type' => 'password',
            'options' => array('translation_domain' => 'FOSUserBundle'),
            'first_options' => array('label' => 'form.new_password'),
            'second_options' => array('label' => 'form.new_password_confirmation'),
            'invalid_message' => 'fos_user.password.mismatch',
        ));*/

        $builder->add('new', 'repeated', array(
            'type' => 'password',
            'options' => array('translation_domain' => 'FOSUserBundle'),
            'first_options' => array('label' => 'Nouveau mot de passe'),
            'second_options' => array('label' => 'Confirmation nouveau mot de passe'),
            'invalid_message' => 'Mot de passe non équivalent',
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FOS\UserBundle\Form\Model\ChangePassword',
            'intention'  => 'resetting',
        ));
    }
 
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }

    public function getName()
    {
        return 'user_reinit_password';
    }
}