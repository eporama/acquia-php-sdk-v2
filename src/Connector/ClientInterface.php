<?php

namespace AcquiaCloudApi\Connector;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\BadResponseException;
use Psr\Http\Message\StreamInterface;

/**
 * Interface ClientInterface
 *
 * @package AcquiaCloudApi\CloudApi
 */
interface ClientInterface
{

    /**
     * Makes a request to the API.
     *
     * @param string $verb
     * @param string $path
     * @param array  $options
     *
     * @return object|array
     */
    public function request(string $verb, string $path, array $options = []);

    /**
     * @param string $verb
     * @param string $path
     * @param array  $options
     * @return ResponseInterface
     */
    public function makeRequest(string $verb, string $path, array $options = []);

    /**
     * Processes the returned response from the API.
     *
     * @param ResponseInterface $response
     * @return object|array
     * @throws \Exception
     */
    public function processResponse(ResponseInterface $response);

    /**
     * Get query from Client.
     *
     * @return array
     */
    public function getQuery();

    /**
     * Clear query.
     */
    public function clearQuery();

    /**
     * Add a query parameter to filter results.
     *
     * @param string     $name
     * @param string|int $value
     */
    public function addQuery($name, $value);
}