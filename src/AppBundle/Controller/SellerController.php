<?php


namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Item;


class SellerController extends Controller
{
    /**
     * @Route ("/seller", name = "seller_dashboard")
     * @Method("GET")
     */

    public function sellerAction()
    {
        $em = $this->getDoctrine();

        $items = $em->getRepository('AppBundle:Item')->findAll();

        return $this->render('dashboard/seller.dashboard.html.twig', array('items' => $items));
    }

}