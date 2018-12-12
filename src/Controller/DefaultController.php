<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\database;

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

        $generos = database::selectGen();

        return $this->render('generos/generos.html.twig', [
            'generos' => $generos,
        ]);
    }

    /**
     * @Route("/generos/{slug}", name="generos_seleccion")
     */

    public function generosSeleccion($slug)
    {

        $canciones = database::selectCancionesByGenero($slug);
        $genero = database::selectGenById($slug);

        return $this->render('generos/generosSeleccion.html.twig', [
            'slug' => $slug,
            'canciones'=>$canciones,
            'genero'=>$genero,
        ]);
    }
    /**
 * @Route("/cancion/{slug}", name="cancion_seleccion")
 */
    public function cancion($slug)
    {
        $cancion = database::selectCancion($slug);
        return $this->render('default/cancion.html.twig', [
            'slug' => $slug,
            'cancion'=>$cancion,
        ]);

    }

    /**
     * @Route("/top", name="top_index")
     */
    public function top()
    {
        $canciones = database::selectCancionesTodas();
        return $this->render('default/top.html.twig', [
            'canciones'=>$canciones,
        ]);

    }

    /**
     * @Route("/artistas", name="artistas_index")
     */

    public function artistas()
    {

        // Aqui se cargan los diferentes generos disponibles

        $artistas = database::selectCant();

        return $this->render('artistas/artistas.html.twig', [
            'artistas' => $artistas,
        ]);
    }

    /**
     * @Route("/artistas/{slug}", name="artistas_seleccion")
     */

    public function artistasSeleccion($slug)
    {

        $canciones = database::selectCancionesByCant($slug);
        $artista = database::selectCantById($slug);

        return $this->render('artistas/artistasSeleccion.html.twig', [
            'slug' => $slug,
            'canciones'=>$canciones,
            'artista'=>$artista,
        ]);
    }

}
