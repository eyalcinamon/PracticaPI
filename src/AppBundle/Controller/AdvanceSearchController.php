<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Objetos;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\SearchType;


class AdvanceSearchController extends Controller {

	/**
	 * @Route("/search", name="advance_search")
	 */
	public function showAction(Request $request) {
		
		// 1 construir el formulario
		$objeto = new Objetos();
		$form = $this->createForm(new SearchType(), $objeto);
		
		// 2 handle the submit (only happen in POST)
		
		// $_POST parameters
		$tipos = $request->request->get('objeto')['idtipo'];
		$objeto->setIdtipo(null);
		$request->request->set('objeto', $objeto);
		
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			
			if ($form->get ( 'search' )->isClicked()) {
				
			} else if ($form->get ( 'searchAll' )->isClicked()) {
				try {
					// 3 hacemos la query de la búsqueda
					$busqueda = $this->getDoctrine()
					->getRepository('AppBundle:Objetos')
					->findAll();
				} catch (ORMException $ex) {
					$this->addFlash('notice', 'Se ha producido un error al crear el usuario');
					$this->addFlash('error', $ex->getMessage());
				}
			}
			
			return $this->render(
					':Search:results.html.php',
					array('objetos' => $busqueda)
					);
		}
		
		$usr = $this->get('security.token_storage')->getToken()->getUser();
				
		$this->addFlash(
				'notice',
				'caca'//$usr->getNombre()
				);
		
		return $this->render(
				':Search:search.html.php',
				array('form' => $form->createView())
				);
	}
}