<?php

declare(strict_types=1);

namespace Tests\Unit\ValueObject;

use AntsAi\ValueObject\LlmUrl;

it("creates a valide secure url", function(): void{
  $llmUrl = new LlmUrl(url: "domain.com");

  expect($llmUrl)->toBeInstanceOf(LlmUrl::class);

  expect($llmUrl->url)->toEqual("https://domain.com");
  
});
