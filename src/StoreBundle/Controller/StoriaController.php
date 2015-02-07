<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StoriaController extends Controller
{
    public function indexAction()
    {
        return $this->render('StoreBundle:Storia:storia.html.twig');
    }
}
