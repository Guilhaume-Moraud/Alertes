<?php

    namespace AppBundle\Form;

    use Symfony\Bridge\Doctrine\Form\Type\EntityType;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;

    class GroupeType extends AbstractType {
        /**
         * {@inheritdoc}
         */
        public function buildForm(FormBuilderInterface $builder, array $options) {
            $builder
                ->add('nomGroupe', TextType::class)
                ->add('contacts', EntityType::class, array(
                    'class'        => 'AppBundle:Contact',
                    'choice_label' => 'email',
                    'multiple'     => true,
                ))
            ;
        }

        /**
         * {@inheritdoc}
         */
        public function configureOptions(OptionsResolver $resolver) {
            $resolver->setDefaults(array('data_class' => 'AppBundle\Entity\Groupe'));
        }

        /**
         * {@inheritdoc}
         */
        public function getBlockPrefix() {
            return 'appbundle_groupe';
        }


    }
