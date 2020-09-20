<?php

namespace App\Controller;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
	public function index()
	{
		return new Response('Hello Symfony!');
	}
}