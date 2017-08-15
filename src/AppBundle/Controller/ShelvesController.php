<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Shelving;
use AppBundle\Entity\Shelf;
use AppBundle\Form\ShelfType;


class ShelvesController extends Controller
{

    /**
     * @Route("/add_shelves", name="add shelf")
     */
    public function addShelvesAction(Request $request)
    {
        $shelf = new Shelf();


        $form = $this->createForm(ShelfType::class, $shelf);


        $form->handleRequest($request);


        if ($form->isValid() && $form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($shelf);
            $em->flush();

            return $this->redirectToRoute('shelvings_list');

        }

        return $this->render('shelf/add_shelf.html.twig', array('form' => $form->createView()));
    }


}