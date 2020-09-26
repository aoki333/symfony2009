<?php

namespace App\Controller;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\Request;
 use Symfony\Component\Routing\Annotation\Route;

 use Symfony\Component\Form\Extension\Core\Type\TextType;
 use Symfony\Component\Form\Extension\Core\Type\EmailType;
 use Symfony\Component\Form\Extension\Core\Type\IntegerType;
 use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HelloController extends AbstractController
{
    /**
    * @Route("/hello",name="hello")
    */
    public function index(Request $request)
    {
        $person=new Person();//Personのsetterメソッドでは最後にreturn $thisをつけてインスタンス自身を返すようにしているので、メソッドチェーンとして記述することが出来る。
        $person->setName('taro')
        ->setAge(36)
        ->setMail('taro@yamada.kun');
        $form=$this->createFormBuilder($person)
        //createFormBuilderを呼び出す際、引数にPersonインスタンスが設定されている。これにより、$personの値を保持するカタチでFormInterfaceが形成されいてる。
        //そのためには、引数に使うクラスに用意されているプロパティとaddする項目の整合性が取れていなければならない。各項目の名前と値のタイプが合致していなければ、引数のインスタンスの値をそのままフォームに設定できないので注意。
        ->add('name',TextType::class)
        ->add('age',IntegerType::class)
        ->add('mail',EmailType::class)
        ->add('save',SubmitType::class,['label'=>'click'])
        ->getForm();
        //POST送信された際の処理
        if($request->getMethod()=='POST'){
            $form->handleRequest($request);
            //handleRequest でRequestとハンドリングしたあと、フォームの値を取得している
            $obj=$form->getData();
            //まず、$formのgetDataを呼び出している。これにより$formからPersonインスタンスが呼び出せる
            $msg='Name: '.$obj->getName().'<br>'
                .'Age: '.$obj->getAge().'<br>'
                .'Mail: '.$obj->getMail();
        }else{
            $msg='お名前をどうぞ！';
        }
        return $this->render('hello/index.html.twig',[
            'title'=>'Hello',
            'message'=>$msg,
            'form'=>$form->createView(),
        ]);
    }
}
//データクラス
class Person
{
    protected $name;
    protected $age;
    protected $mail;

    public function getName()
    {
        return $this->name;
    }
    public function setName($name){
        $this->name=$name;
        return $this;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function setAge($age)
    {
        $this->age=$age;
        return $this;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail=$mail;
        return $this;
    }
}