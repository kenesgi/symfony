<?php

namespace PB\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PBBlogBundle:Default:index.html.twig', array('name' => $name));
    }
}
