<?php

declare(strict_types=1);

namespace AntsAi\Contract;

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
