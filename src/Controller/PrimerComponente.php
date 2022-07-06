<?php

declare (strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of PrimerComponente
 *
 * @author ezequiel
 */
class PrimerComponente {
    
    #[Route('/primer-controlador',name:"primer-controlador",methods:['GET'])]
    public function __invoke(): Response{
        
        return new JsonResponse(
                ["status"=> "ok","message"=> "Nada que decir"]
        );
        
    }
}
