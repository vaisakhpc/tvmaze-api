<?php

namespace App\Http\Middleware;

use Closure;
use Src\Services\LoggerInterface;

class LoggerMiddleware
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        $this->logger->log('Request received => ' . json_encode($request->all()), 'request.log', 'request');
        $this->logger->log('Response to be sent => ' . $response->content(), 'response.log', 'response');
    }

}