<?php

declare(strict_types=1);

namespace Tests\Unit\ValueObject;

use PHPCrewsAi\ValueObject\Llm;
use PHPCrewsAi\ValueObject\ApiKey;
use PHPCrewsAi\ValueObject\LlmUrl;
use PHPCrewsAi\Enum\Llm\SupportedLlms;

it("creates LLM instance", function (): void {

  $llm = new Llm(
    model: SupportedLlms::OPENAI_CHATGPT_4o_MINI,
    apiKey: ApiKey::from("foo"),
    url: LlmUrl::from("https://api.openai.com/v1/chat/completions"),
    apiVersion: ""
  );

  expect($llm)->toBeObject();
  expect($llm)->toBeInstanceOf(Llm::class);

  expect($llm->apiKey->apiKey)->toEqual("foo");
});
