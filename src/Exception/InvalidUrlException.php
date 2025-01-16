<?php

declare(strict_types=1);

namespace PHPCrewsAi\Exception;

use Exception;

final class InvalidUrlException extends Exception
{
  public function __construct(string $message)
  {
    parent::__construct($message);
  }
}
