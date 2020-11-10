<?php

namespace App\Controller;

use App\Entity\Publication;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Publication::class);
        $publi = $repo->findLastedPub();
        return $this->render('blog/home.html.twig', [
            'publis' => $publi
        ]);
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Publication::class);
        $publi = $repo->findAll();
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'publis' => $publi
        ]);
    }

    /**
     * @Route("/blog/{id}", name="blogshow")
     */
    public function show($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Publication::class);
        $publication = $repo->find($id);
        return $this->render('blog/show.html.twig',[
            'publis' => $publication
        ]);
    }
}
