<?php

declare(strict_types=1);

namespace AntsAi\Contract;

use OpenAI\Exceptions\ErrorException;
use OpenAI\Exceptions\TransporterException;
use OpenAI\Exceptions\UnserializableResponse;
use OpenAI\ValueObjects\Transporter\Payload;
use OpenAI\ValueObjects\Transporter\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
interface NetworkInterface
{
    /**
     * Sends a content request
     *
     * @throws SomeErrorException|NetworkException
     */
    public function requestContent(Payload $payload): string;

    /**
     * Sends a stream request.
     **
     * @throws SomeErrorException
     */
    public function requestStream(Payload $payload): ResponseInterface;
}
