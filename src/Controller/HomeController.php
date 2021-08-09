<?php

namespace App\Controller;

use App\Entity\Subcriber;
use App\Form\SusbcriberType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class HomeController extends AbstractController
{
public function __construct(EntityManagerInterface $manager){
    $this->manager = $manager;
}
    #[Route('/', name: 'app_home')]
    public function index(Request $request ): Response
    {
        $subcriber = new Subcriber();
        $form = $this->createForm(SusbcriberType::class, $subcriber);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->manager->persist($subcriber);
            $this->manager->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->render('home/index.html.twig', [
            'Webpack' => $form->createView()
        ]);
    }
}
