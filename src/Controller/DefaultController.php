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

    /**
     * @Route("/generos", name="generos_index")
     */

    public function generos()
    {

        // Aqui se cargan los diferentes generos disponibles
        $generos = [
            ['genero' => 'Big Band', 'img' =>'images/genero-big-band.jpg'],
            ['genero' => 'Country', 'img' =>'images/genero-country.jpg'],
            ['genero' => 'EDM', 'img' =>'images/genero-edm.jpg'],
            ['genero' => 'Hard Rock', 'img' =>'images/genero-hard-rock.jpg'],
            ['genero' => 'Punk', 'img' =>'images/genero-punk.jpg'],
            ['genero' => 'Solitario', 'img' =>'images/genero-solitario.jpg'],
            ['genero' => 'Xilofono', 'img' =>'images/genero-xilofono.jpg'],
        ];

        return $this->render('generos/generos.html.twig', [
            'generos' => $generos,
        ]);
    }

    /**
     * @Route("/generos/{slug}", name="generos_seleccion")
     */

    public function generosSeleccion($slug)
    {
        return $this->render('generos/generos.html.twig');
    }



}