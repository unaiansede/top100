<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
	public function index()
	{
		return $this->render('default/index.html.twig');
	}

	/**
     * @Route("/news/{slug}", name="index_show")
     */
	public function show($slug)
    {
        $comments = [
            'Hola que tal',
            'hola si',
            'si eee jeje',
        ];

        //dump($slug,$this);

        return $this->render('default/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'slug' => $slug,
            'comments' => $comments,
    ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="index_toggle_heart", methods={"POST"})
     */
    public function toggleIndexHeart($slug)
    {
        // TODO - update in db

        return $this->json(['hearts' => rand(5, 100)]);

    }


}