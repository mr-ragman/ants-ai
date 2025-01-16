<?php

declare(strict_types=1);

namespace Tests\Unit\ValueObject;

use AntsAi\ValueObject\Llm;
use AntsAi\ValueObject\ApiKey;
use AntsAi\ValueObject\LlmUrl;
use AntsAi\Enum\Llm\SupportedLlms;

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
