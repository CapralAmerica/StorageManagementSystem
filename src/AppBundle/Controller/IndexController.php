<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Item;

class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     */

    public function indexAction()
    {
        return $this->render('index.html.twig');
    }

}
