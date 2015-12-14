<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType {
	
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
		-> add('email', 'email')
		-> add('nombre', 'text')
		-> add('plainPassword', 'repeated', array (
				'type' => 'password',
				'first_options' => array('label' => 'Password'),
				'second_options' => array('label' => 'Repeat Password'),
			)
		);
	}
	
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array('data_class' => 'AppBundle\Entity\Usuarios'));
	}
	
	public function getName() {
		return 'user';
	}
}