<?php


namespace Sofiakb\Lumen\ApiKey\Http\Middleware;

use Sofiakb\Lumen\ApiKey\Models\ApiKey;
use Closure;
use Illuminate\Http\Request;
use Sofiakb\Lumen\ApiKey\Services\Parser;
use Sofiakb\Utils\Response;

/**
 * Class ApiKeyMiddleware
 * @package Sofiakb\Lumen\ApiKey\Http\Middleware
 */
class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next)
    {
        if (strtoupper($request->getMethod()) !== "OPTIONS") {
            
            /* Récupération de la clé d'API */
            if (($apiKey = $request->header('X-API-KEY')) === null || ($apiKey = $request->header('x-api-key')) === null)
                return Response::error(403, "La clé d'API n'est pas renseignée");
            
            /* Concordance entre l'IP et la clé d'API */
            $parser = new Parser();
            // $splat = explode('.s00', $apiKey);
            if (($entry = ApiKey::where('key', $parser->encode($apiKey, true))->first()) === null)
                return Response::error(403, "La clé d'API est inconnue de nos services");
        }
        return $next($request);
        
    }
}