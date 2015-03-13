<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('joli_blog_homepage', new Route('/hello/{name}', array(
    '_controller' => 'JoliBlogBundle:Default:index',
)));

return $collection;
