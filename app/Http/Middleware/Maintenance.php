<?php

namespace App\Http\Middleware;

use \Exception;

class Maintenance {
    /**
     * Método responsável por executar o middleware
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle($request, $next){
        //VERIFICA O ETADO DE MANUTENÇÃO DA PÁGINA
        if(getenv('MAINTENANCE') == 'true'){
            throw new Exception("Página em manutenção. Tente mais tarde.", 200);            
        }
        
        //EXECUTA O PRÓXIMO NÍVEL DO MIDDLEWARE
        return $next($request);
    }

}