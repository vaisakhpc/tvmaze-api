<?php

namespace App\Http\Middleware;

use Src\Services\ValidatorInterface;
use Closure;
use Src\Exceptions\BadRequestException;

class ValidateMiddleware
{
    private $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
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
        if (!$this->validator->validate($request)) {
            throw new BadRequestException(implode(", ", $this->validator->getErrors()), 400);
        }
        return $next($request);
    }

}