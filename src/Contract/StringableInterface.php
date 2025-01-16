<?php

declare(strict_types=1);

namespace PHPCrewsAi\Contract;

/**
 * @internal
 */
interface StringableInterface
{
  /**
   * String representation of this object.
   */
  public function toString(): string;
}
