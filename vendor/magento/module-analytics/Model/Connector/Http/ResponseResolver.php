<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Analytics\Model\Connector\Http;

/**
 * Extract result from http response. Call response handler by status.
 */
class ResponseResolver
{
    /**
     * @var ConverterInterface
     */
    private $converter;

    /**
     * @var array
     */
    private $responseHandlers;

    /**
     * @param ConverterInterface $converter
     * @param ResponseHandlerInterface[] $responseHandlers
     */
    public function __construct(ConverterInterface $converter, array $responseHandlers = [])
    {
        $this->converter = $converter;
        $this->responseHandlers = $responseHandlers;
    }

    /**
     * @param \Zend_Http_Response $response
     *
     * @return bool|string
     */
    public function getResult(\Zend_Http_Response $response)
    {
        $result = false;
        $responseBody = $this->converter->fromBody($response->getBody());
        if (array_key_exists($response->getStatus(), $this->responseHandlers)) {
            $result = $this->responseHandlers[$response->getStatus()]->handleResponse($responseBody);
        }

        return $result;
    }
}
