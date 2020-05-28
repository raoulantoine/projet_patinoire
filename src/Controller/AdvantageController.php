<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdvantageController extends AbstractController
{
    /**
     * @Route("/advantage", name="advantage")
     */
    public function index()
    {
        return $this->render('advantage/index.html.twig', [
            'controller_name' => 'AdvantageController',
        ]);
    }
}
