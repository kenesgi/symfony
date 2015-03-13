<?php

namespace PB\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleController extends Controller
{
    public function indexAction($page)
    {
    	if ($page < 1) {
      		throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    	}
    	
    	$listArticles = $this->getDoctrine()
    						 ->getManager()
    						 ->getRepository('PBBlogBundle:Article');
    						 //->findAll();
  
  		$listArticles = $repository->myFindAll();
  		
	return $this->render('PBBlogBundle:Article:index.html.twig', array('listArticles' => $listArticles));

    }
     
  	public function viewAction($id)
  	{
    
    	$article = array(
      		'title'   => 'Recherche développpeur Symfony2',
   			'id'      => $id,
   			'author'  => 'Alexandre',
      		'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
      		'date'    => new \Datetime()
    	);

    return $this->render('PBBlogBundle:Article:view.html.twig', array(
      'article' => $article
    ));
  	}
  	
  	public function addAction(Request $request)

  {

    if ($request->isMethod('POST')) {


      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');


      return $this->redirect($this->generateUrl('pb_blog_view', array('id' => 5)));

    }


    return $this->render('PBBlogBundle:Article:add.html.twig');

  }

  public function editAction($id, Request $request)

  {

    if ($request->isMethod('POST')) {

      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

      return $this->redirect($this->generateUrl('pb_blog_view', array('id' => 5)));

    }

    return $this->render('PBBlogBundle:Article:edit.html.twig', array('article' => $article));

  }

  public function deleteAction($id)

  {

    return $this->render('PBBlogBundle:Article:delete.html.twig');

  }
  
  public function menuAction($limit)

  {

    // On fixe en dur une liste ici, bien entendu par la suite

    // on la récupérera depuis la BDD !

    $listArticles = array(

      array('id' => 2, 'title' => 'Recherche développeur Symfony2'),

      array('id' => 5, 'title' => 'Mission de webmaster'),

      array('id' => 9, 'title' => 'Offre de stage webdesigner')

    );

    return $this->render('PBBlogBundle:Article:menu.html.twig', array(

      // Tout l'intérêt est ici : le contrôleur passe

      // les variables nécessaires au template !

      'listArticles' => $listArticles

    ));

  }
  
}