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
            ['nombre' => 'Big Band', 'img' =>'images/genero-big-band.jpg'],
            ['nombre' => 'Country', 'img' =>'images/genero-country.jpg'],
            ['nombre' => 'EDM', 'img' =>'images/genero-edm.jpg'],
            ['nombre' => 'Hard Rock', 'img' =>'images/genero-hard-rock.jpg'],
            ['nombre' => 'Punk', 'img' =>'images/genero-punk.jpg'],
            ['nombre' => 'Solitario', 'img' =>'images/genero-solitario.jpg'],
            ['nombre' => 'Xilofono', 'img' =>'images/genero-xilofono.jpg'],
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
        $canciones = [
            ['nombre' => 'Big Band', 'img' =>'images/genero-big-band.jpg'],
            ['nombre' => 'Country', 'img' =>'images/genero-country.jpg'],
            ['nombre' => 'EDM', 'img' =>'images/genero-edm.jpg'],
            ['nombre' => 'Hard Rock', 'img' =>'images/genero-hard-rock.jpg'],
            ['nombre' => 'Punk', 'img' =>'images/genero-punk.jpg'],
            ['nombre' => 'Solitario', 'img' =>'images/genero-solitario.jpg'],
            ['nombre' => 'Xilofono', 'img' =>'images/genero-xilofono.jpg'],
        ];
        return $this->render('generos/generosSeleccion.html.twig', [
            'slug' => $slug,
            'img' => 'images/genero-' . str_replace(' ', '-',strtolower($slug)) . '.jpg',
            'canciones'=>$canciones,
        ]);
    }
    /**
     * @Route("/cancion/{slug}", name="cancion_seleccion")
     */
    public function cancion($slug)
    {
        $cancion = [
            ['nombre' => 'pepe','img'=>'images/genero-punk.jpg'],
            ['nombre' => 'b' ,'img'=>'images/genero-punk.jpg'],
            ['nombre' => 'c' ,'img'=>'images/genero-punk.jpg'],
            ['nombre' => 'd' ,'img'=>'images/genero-punk.jpg'],
            ['nombre' => 'e' ,'img'=>'images/genero-punk.jpg'],
            ['nombre' => 'f' ,'img'=>'images/genero-punk.jpg'],
            ['nombre' => 'g' ,'img'=>'images/genero-punk.jpg'],

        ];
        return $this->render('generos/generosSeleccion.html.twig', [
            'slug' => $slug,
            'img' => 'images/genero-punk.jpg' /*. str_replace(' ', '-',strtolower($slug)) . '.jpg'*/,
            'canciones'=>$cancion,
        ]);

    }



}
