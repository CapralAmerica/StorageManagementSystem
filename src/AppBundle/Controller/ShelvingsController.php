<?php


namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Shelving;
use AppBundle\Entity\Shelf;
use AppBundle\Form\ShelvingType;


class ShelvingsController extends Controller
{
   /**
    * @Route("/shelvings_list", name="shelvings_list" )
    */

   public function shelvingListAction()
   {
       $em = $this->getDoctrine()->getRepository('AppBundle:Shelving');
       $shelvings = $em->findAll();

      return $this->render('shelvings/shelvings_list.html.twig', array('shelvings' => $shelvings));
   }

   /**
    * @Route("/shelvings_list/add", name="add_shelving")
    */

   public function addNewShelvingAction(Request $request)
   {
       $shelving = new Shelving();

       $form = $this->createForm(ShelvingType::class, $shelving);

       $validator = $this->get('validator');
       $errors = $validator->validate($shelving);



       $form->handleRequest($request);


       if ($form->isValid() && $form->isSubmitted())
       {
           $em = $this->getDoctrine()->getManager();

           $em->persist($shelving);
           $em->flush();

           return $this->redirectToRoute('shelvings_list');

       }

       return $this->render('shelvings/add_shelving.html.twig', array('form' => $form->createView(),
                                                                           'errors'=> $errors));
   }

    /**
     * @Route("/shelvings_list/delete/{id}", name = "shelving delete")
     */

    public function deleteItemAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $shelving = $em->getRepository('AppBundle:Shelving')->find($id);

        $em->remove($shelving);
        $em->flush();

        return $this->redirectToRoute('shelvings_list');
    }

    /**
     * @Route("/shelvings_list/{id}", name = "shelving details")
     */

    public function itemDetailsAction($id)
    {
        $em = $this->getDoctrine();
        /** @var Shelving $shelving */
        $shelving = $em->getRepository('AppBundle:Shelving')->find($id);
        $shelfs = $shelving->getShelfs()->toArray();

        return $this->render("shelvings/shelving_details.html.twig", array('shelving' => $shelving, 'shelfs' => $shelfs));
    }

    /**
     * @Route("/shelvings_list/edit/{id}", name = "shelving edit")
     */

    public function editItemAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $shelving = $em->getRepository('AppBundle:Shelving')->find($id);

        $form = $this->createForm(ShelvingType::class, $shelving);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($shelving);
            $em->flush();

            return $this->redirectToRoute('shelvings_list');

        }

        return $this->render('shelvings/shelving_edit.html.twig', array('form' => $form->createView()));
    }


}