<?php

declare(strict_types=1);

namespace PHPCrewsAi\Contract\Agent;

use PHPCrewsAi\Contract\Llm\LlmResponseInterface;

interface AgentInterface
{
  /** $message User message */
  public function execute(string $message): LlmResponseInterface;

  /**
   * Every Agent must have ID/Name
   * 
   * Use this method to validate or autogenate ID
   * 
   * ID must be a string
   */
  public function generateId(): void;

  /**
   * retrieve the current Agent Id
   */
  public function id(): string;
}
