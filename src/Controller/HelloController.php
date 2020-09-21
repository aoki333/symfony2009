<?php

namespace App\Controller;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
	/**
	* @Route("/hello",name="hello")
	*/
	public function index()
	{
		return new Response('Hello Symfony!');
	}
}