<?php
namespace Src\Services;

use Illuminate\Http\Request;

class ValidatorService implements ValidatorInterface
{
    private array $error = [];

    /**
     * validate
     * @param Request $query
     * @return bool
     */
    public function validate(Request $query): bool
    {
        $queryString = $query->get('q');
        $return = true;
        if (!$queryString) {
            $this->error[] = "Empty query can't be accepted";
            $return = false;
        }
        return $return;
    }

    /**
     * get Errors
     * @return array
     */
    public function getErrors(): array
    {
        return $this->error;
    }
}