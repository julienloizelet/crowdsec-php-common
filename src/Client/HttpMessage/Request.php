<?php

declare(strict_types=1);

namespace CrowdSec\Common\Client\HttpMessage;

use CrowdSec\Common\Constants;

/**
 * Request that will be sent to CrowdSec.
 *
 * @author    CrowdSec team
 *
 * @see      https://crowdsec.net CrowdSec Official Website
 *
 * @copyright Copyright (c) 2022+ CrowdSec
 * @license   MIT License
 */
class Request extends AbstractMessage
{
    /**
     * @var array
     */
    protected $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ];
    /**
     * @var string
     */
    private $method;
    /**
     * @var array
     */
    private $parameters;
    /**
     * @var string
     */
    private $uri;

    public function __construct(
        string $uri,
        string $method,
        array $headers = [],
        array $parameters = [],
        string $type = Constants::TYPE_REST
    ) {
        $this->uri = $uri;
        $this->method = $method;
        $this->headers = Constants::TYPE_REST === $type ? array_merge($this->headers, $headers) : $headers;
        $this->parameters = $parameters;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParams(): array
    {
        return $this->parameters;
    }

    public function getUri(): string
    {
        return $this->uri;
    }
}
