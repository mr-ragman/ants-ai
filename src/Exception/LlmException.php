<?php

declare(strict_types=1);

namespace AntsAi\Exception;

use Exception;

final class LlmException extends Exception
{
  public function __construct(string $message)
  {
    parent::__construct($message);
  }
}
