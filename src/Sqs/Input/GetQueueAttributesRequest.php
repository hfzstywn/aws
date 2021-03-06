<?php

namespace AsyncAws\Sqs\Input;

use AsyncAws\Core\Exception\InvalidArgument;

class GetQueueAttributesRequest
{
    /**
     * The URL of the Amazon SQS queue whose attribute information is retrieved.
     *
     * @required
     *
     * @var string|null
     */
    private $QueueUrl;

    /**
     * A list of attributes for which to retrieve information.
     *
     * @var string[]
     */
    private $AttributeNames;

    /**
     * @param array{
     *   QueueUrl: string,
     *   AttributeNames?: string[],
     * } $input
     */
    public function __construct(array $input)
    {
        $this->QueueUrl = $input['QueueUrl'] ?? null;
        $this->AttributeNames = $input['AttributeNames'] ?? [];
    }

    public static function create($input): self
    {
        return $input instanceof self ? $input : new self($input);
    }

    public function getAttributeNames(): array
    {
        return $this->AttributeNames;
    }

    public function getQueueUrl(): ?string
    {
        return $this->QueueUrl;
    }

    public function requestBody(): array
    {
        $payload = ['Action' => 'GetQueueAttributes', 'Version' => '2012-11-05'];
        if (null !== $this->QueueUrl) {
            $payload['QueueUrl'] = $this->QueueUrl;
        }
        if (null !== $this->AttributeNames) {
            $payload['AttributeNames'] = $this->AttributeNames;
        }

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

    public function setAttributeNames(array $value): self
    {
        $this->AttributeNames = $value;

        return $this;
    }

    public function setQueueUrl(?string $value): self
    {
        $this->QueueUrl = $value;

        return $this;
    }

    public function validate(): void
    {
        foreach (['QueueUrl'] as $name) {
            if (null === $this->$name) {
                throw new InvalidArgument(sprintf('Missing parameter "%s" when validating the "%s". The value cannot be null.', $name, __CLASS__));
            }
        }
    }
}
