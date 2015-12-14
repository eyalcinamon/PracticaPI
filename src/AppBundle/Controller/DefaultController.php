<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Gestores;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Objetos;

class DefaultController extends Controller
{
	
	/**
	 * @Route("/home", name="homepage")
	 */
	public function indexAction(Request $request)
	{
		$query_select = "SELECT o FROM AppBundle:Objetos o WHERE o.disponible_sn = 's' order by o.id desc";
		
		$query = $this->getDoctrine ()->getManager ()->createQuery($query_select)
      		->setMaxResults(5);
		
      	$ofertados = $query->getResult();
		if (! $ofertados) {
			throw $this->createNotFoundException ( 'No hay ofertas' );
		}
		
		$usr = $this->get('security.token_storage')->getToken()->getUser();
		if ($usr != null) {
			
		}
		
		return $this->render ( ':Default:index.html.php', array(
            'ofertados' => $ofertados));
	}
	
	
    /**
     * @Route("/", name="homepage")
     *
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.php', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }*/
    
    /**
     * @Route("/admin")
     */
    public function adminAction()
    {
    	return new Response('<html><body>Admin page!</body></html>');
    }
    
    /**
     * @Route("/test", name="prueba")
     */
    public function createAction()
    {
    	try{
	    	$gestores = new Gestores();
	    	$gestores->setEmail('test@g.es');
	    	$gestores->setNombre('test');
	    	$gestores->setPassword('122');
	    	$gestores->setJefeSn('N');
	    
	    	$em = $this->getDoctrine()->getManager();
	    
	    	$em->persist($gestores);
	    	$em->flush();
	    
	    	$gestores = $this->getDoctrine()
	    	->getRepository('AppBundle:Gestores')
	    	->find(11);
	    	
	    	return new Response('Created product id ');
    	
    	} catch (\Doctrine\ORM\ORMException $ex) {
    		$this->addFlash('error', $ex->getMessage());
    	}
    }
}
