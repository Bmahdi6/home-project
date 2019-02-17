<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @Route("/home", name="base")
     */
    public function index()
    {
        return $this->render('base/base.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
}
