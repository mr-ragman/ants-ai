<?php

declare(strict_types=1);

namespace AntsAi\ValueObject;

use AntsAi\Contract\Llm\LlmResponseInterface;

/**
 * @internal
 *
 * Generic Response State Wrapper
 */

final class ResponseState implements LlmResponseInterface
{
  public readonly string $createdOn;

  public function __construct(
    public readonly string $type,
    public readonly string $content,
  ) {
    $this->createdOn = date("Y-m-d H:i:s");
  }
}
