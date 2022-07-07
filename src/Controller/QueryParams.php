<?php

declare (strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Description of getQueryParams
 *
 * @author ezequiel
 */
#[Route('/user')]
class QueryParams extends AbstractController {

    //Agregro Logger para usarlo en el controlador
    public function __construct(private LoggerInterface $logger) {
        
    }

    #[Route('/query', name: "get-query-params", methods: ['GET'])]
    public function getQueryParams(Request $request): Response {

        $name = $request->query->get('name');
        $email = $request->query->get('email');

        return $this->render(
                    "params/params.html.twig", [
                    "name" => $name,
                    "email" => $email
        ]);

        //        return new JsonResponse([
        //            "nombre"=> $request->query->get('name'),
        //            "email"=> $request->query->get('email')
        //        ]);
        //        
    }

    #[Route('/attributesuno/{name}/{email}', name: "get-attr1-params", methods: ['GET'])]
    public function getFromAttrParamsUno(Request $request): Response {

        //        logger dentro de un controlador
        $this->logger->info('Esto es un mensaje');

        return new JsonResponse([
            "nombre" => $request->attributes->get('name'),
            "email" => $request->attributes->get('email')
        ]);
    }

    #[Route('/attributesdos/{name}/{email}', name: "get-attr2-params", methods: ['GET'])]
    public function getFromAttrParamsDos(String $name, String $email): Response {


        return new JsonResponse([
            "nombre" => $name,
            "email" => $email
        ]);
    }

    #[Route('/body', name: "get-from-body", methods: ['POST'])]
    public function getFromBodyParams(Request $request): Response {

        $request->request = new ParameterBag(json_decode($request->getContent(), true));

        return new JsonResponse([
            "nombre" => $request->request->get('name'),
            "email" => $request->request->get('email')
        ]);
    }

}
