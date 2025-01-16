<?php

declare(strict_types=1);

namespace Tests\Unit\ValueObject;

use AntsAi\ValueObject\ApiKey;

it("creates a new apiKey from constuctor parameter", function (): void {
  $apiKey = new ApiKey(apiKey: "foo");
  
  expect($apiKey)->toBeObject();

  expect($apiKey->apiKey)->toEqual('foo');
});


it("creates a new apiKey from a factory function", function (): void {
  $apiKey = ApiKey::from(apiKey: "foo");

  expect($apiKey)->toBeInstanceOf(ApiKey::class);

  expect($apiKey->apiKey)->toEqual('foo');
});
