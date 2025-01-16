<?php

declare(strict_types=1);

namespace PHPCrewsAi\Enum\Llm;

/**
 * @internal
 *
 * A list of supported llms
 */
enum SupportedLlms: string
{
  case OPENAI_CHATGPT_4o_MINI = "gpt-4o-mini";
}
