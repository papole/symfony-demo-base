<?php

declare (strict_types=1);

namespace App\Controller\Hello;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Description of HelloController
 *
 * @author ezequiel
 */
class HelloController extends AbstractController {
    
    #[Route('/hola',name:"hola_controller",methods:['GET'])]
    public function __invoke(): Response {
        return $this->render('hello/hello.html.twig');
    }
}
