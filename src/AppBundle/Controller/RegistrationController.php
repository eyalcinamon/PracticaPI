<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Usuarios;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\ORMException;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

class RegistrationController extends Controller {
	
	/**
	 * @Route("/register", name="user_registration")
	 */
	public function registerAction(Request $request) {
		
		// 1 construir el formulario
		$user = new Usuarios();
		$form = $this->createForm(new UserType(), $user);
		
		// 2 handle the submit (only happen in POST)
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			// 3 encode the password 
			$password = $this->get('security.password_encoder')
				->encodePassword($user, $user->getPlainPassword());
			$user->setPassword($password);
			
			try {
				// 4 save the user in the database
				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
				
				$this->addFlash(
						'notice',
						'Usuario ' + $user->getNombre() +' creado correctamente'
						);
			} catch (ORMException $ex) {
				$this->addFlash('notice', 'Se ha producido un error al crear el usuario');
				$this->addFlash('error', $ex->getMessage());
			} catch (UniqueConstraintViolationException $exc) {
				$this->addFlash('notice', 'El usuario ya existe en el sistema');
				$this->addFlash('error', $exc->getMessage());
			}
			
			return $this->redirectToRoute('homepage');
		}
		
		return $this->render(
				//'registration/register.html.twig',
				':Registration:register.html.php',
				array('form' => $form->createView())
				);
		
	}
	
}