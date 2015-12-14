<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class SearchType extends AbstractType {
	
	public function buildForm(FormBuilderInterface $builder, array $options) {
		
		$builder
		->add ( 'descripcion', 'text', array(
				'required' => false,))
		->add ( 'aval_sn', 'checkbox', array(
				'label'    => 'Necesita aval',
				'required' => false,))
		->add ( 'pagoaplazos_sn', 'checkbox', array(
				'label'    => 'Permite pago fraccionado',
				'required' => false,))
		//segun todos los tipos que hay en base de datos
		->add('idtipo', 'entity', array(
                'class' => 'AppBundle\Entity\TiposObjetos',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.nombre', 'DESC');
                },
                'label' => 'Tipos:',
                'property' => 'nombre',
                'expanded' => true,
                'multiple' => true,
                'required' => false,
            ))
         ->add('search', 'submit', array('label' => 'Buscar'))
         ->add('searchAll', 'submit', array('label' => 'Ver todos'));
	}
	
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array('data_class' => 'AppBundle\Entity\Objetos'));
	}
	
	public function getName() {
		return 'objeto';
	}
}