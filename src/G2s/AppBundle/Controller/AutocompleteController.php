<?php

namespace G2s\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AutocompleteController extends Controller
{
    public function indexAction()
    {
        return $this->render('G2sAppBundle:Autocomplete:autocomplete.html.twig');
    }
}
