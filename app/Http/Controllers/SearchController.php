<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Domains\DomainInterface;
use Src\Services\MapperInterface;
use Src\Exceptions\NotFoundException;

class SearchController extends Controller
{
    protected $searchDomain;

    protected $mapper;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DomainInterface $searchDomain, MapperInterface $mapper)
    {
        $this->searchDomain = $searchDomain;
        $this->mapper = $mapper;
    }

    /**
     * Search action
     * @param Request $request
     */
    public function search(Request $request)
    {
        $response = $this->searchDomain->search($request->get('q'));
        if (empty($response->getData())) {
            throw new NotFoundException("No Movies found!", 404);
        }
        return response()->json($this->mapper->mapSuccess($response->getData()));
    }

}
