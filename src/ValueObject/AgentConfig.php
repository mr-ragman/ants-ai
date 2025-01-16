<?php

declare(strict_types=1);

namespace PHPCrewsAi\ValueObject;

use PHPCrewsAi\Enum\Llm\RequestType;
use PHPCrewsAi\Contract\Llm\LlmInterface;

/**
 * @internal
 *
 * Generic Agent Configuration Object
 */

final class AgentConfig
{
  /**
   * @param array<string, mixed> $taskCodes
   */
  public function __construct(
    public readonly string $agentId,
    public readonly LlmInterface $llm,
    public readonly string $objective,
    public readonly RequestType $type = RequestType::CHAT,
    public readonly string $role = "",
    public readonly string $greeting = "",
    public readonly array $taskCodes = []


    // public readonly array $history,
    // public readonly ?int $maxTokens,
    // public readonly int|float|null $temperature,
    // public readonly int|float|null $topP,
    // public readonly array $tools,
    // public readonly array $clientOptions,
    // public readonly array $clientRetry,
    // public readonly string|ToolChoice|null $toolChoice,
    // 
  ) {
    // ...
  }
}
