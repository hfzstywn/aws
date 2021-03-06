<?php

namespace AsyncAws\Core\Sts\Input;

class GetCallerIdentityRequest
{
    public static function create($input): self
    {
        return $input instanceof self ? $input : new self();
    }

    public function requestBody(): array
    {
        $payload = ['Action' => 'GetCallerIdentity', 'Version' => '2011-06-15'];

        return $payload;
    }

    public function requestHeaders(): array
    {
        $headers = [];

        return $headers;
    }

    public function requestQuery(): array
    {
        $query = [];

        return $query;
    }

    public function requestUri(): string
    {
        return '/';
    }

    public function validate(): void
    {
        // There are no required properties
    }
}
