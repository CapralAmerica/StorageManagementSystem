<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;



class StorageKeeperController extends Controller
{

    /**
     * @Route ("/storage_keeper", name = "storage_keeper_dashboard")
     * @Method("GET")
     */

    public function storageKeeperAction()
    {
        return $this->render('dashboard/storage_keeper.dashboard.html.twig');
    }


}