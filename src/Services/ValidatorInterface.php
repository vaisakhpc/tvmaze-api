<?php
namespace Src\Services;

use Illuminate\Http\Request;

interface ValidatorInterface
{
    public function validate(Request $query): bool;

    public function getErrors(): array;
}