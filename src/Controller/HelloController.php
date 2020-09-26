<?php

namespace App\Controller;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\Request;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
    * @Route("/hello",name="hello")
    */
    public function index(Request $request)
    {
        $data=[
            array('name'=>'Taro','age'=>37,'mail'=>'taro@yamada'),
            array('name'=>'Hanako','age'=>24,'mail'=>'hanako@flowe'),
            array('name'=>'Hanako2','age'=>23,'mail'=>'hanako2@flowe'),
            array('name'=>'Hanako3','age'=>22,'mail'=>'hanako3@flowe'),
        ];
       return $this->render('hello/index.html.twig',[
        'title'=>'Hello',
        'data'=>$data,
       ]);
    }
}
