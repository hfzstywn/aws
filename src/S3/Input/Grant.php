<?php

namespace AsyncAws\S3\Input;

class Grant
{
    /**
     * The person being granted permissions.
     *
     * @var Grantee|null
     */
    private $Grantee;

    /**
     * Specifies the permission given to the grantee.
     *
     * @var string|null
     */
    private $Permission;

    /**
     * @param array{
     *   Grantee?: \AsyncAws\S3\Input\Grantee|array,
     *   Permission?: string,
     * } $input
     */
    public function __construct(array $input = [])
    {
        $this->Grantee = isset($input['Grantee']) ? Grantee::create($input['Grantee']) : null;
        $this->Permission = $input['Permission'] ?? null;
    }

    public static function create($input): self
    {
        return $input instanceof self ? $input : new self($input);
    }

    public function getGrantee(): ?Grantee
    {
        return $this->Grantee;
    }

    public function getPermission(): ?string
    {
        return $this->Permission;
    }

    public function setGrantee(?Grantee $value): self
    {
        $this->Grantee = $value;

        return $this;
    }

    public function setPermission(?string $value): self
    {
        $this->Permission = $value;

        return $this;
    }

    public function validate(): void
    {
        if ($this->Grantee) {
            $this->Grantee->validate();
        }
    }
}
