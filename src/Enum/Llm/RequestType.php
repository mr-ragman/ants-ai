<?php

declare(strict_types=1);

namespace PHPCrewsAi\Enum\Llm;

enum RequestType: string
{
  case CHAT = "chat";

  case AUDIO = "audio";

  case EMBEDDING = "embeddings";

  case FINETUNING = "fine-tuning";

  case INVALID = "not_implemented";
}
