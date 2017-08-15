<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Item;
use AppBundle\Form\ItemType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ItemController extends Controller
{

    /**
     * @Route ("/add", name="add item")
     */

    public function addItemAction(Request $request)
    {
        $item = new Item();

        $form = $this->createForm(ItemType::class, $item);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('storage_keeper_dashboard');

        }

        return $this->render('items/add_item_page.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/items_list", name = "items_list")
     */
    public function itemListAction()
    {
        $em = $this->getDoctrine();
        $items = $em->getRepository('AppBundle:Item')->findAll();

        return $this->render('items/items_list.html.twig', array('items' => $items));
    }

    /**
     * @Route("/items_list/{id}", name = "item details")
     */
    public function itemDetailsAction($id)
    {
        $em = $this->getDoctrine();
        $item = $em->getRepository('AppBundle:Item')->find($id);

        return $this->render("items/item_details.html.twig", array('item' => $item));
    }

    /**
     * @Route("/items_list/delete/{id}", name = "item delete")
     */
    public function deleteItemAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('AppBundle:Item')->find($id);

        $em->remove($item);
        $em->flush();

        return $this->redirectToRoute('items_list');
    }

    /**
     * @Route("/items_list/edit/{id}", name = "item edit")
     */
    public function editItemAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('AppBundle:Item')->find($id);

        $form = $this->createForm(ItemType::class, $item);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('items_list');

        }

        return $this->render('items/item_edit.html.twig', array('form' => $form->createView()));
    }

}