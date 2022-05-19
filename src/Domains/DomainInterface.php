<?php

namespace Src\Domains;

interface DomainInterface
{
    public function search(?string $query);
}