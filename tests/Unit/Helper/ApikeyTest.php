<?php

declare(strict_types=1);

namespace Tests\Unit\Helper;

use Exception;
use PHPCrewsAi\Helper\Apikey;

test("invalid or missing env variable: throws Exception", function (): void {
  $envVariable = "OPENIA_FAKE_API_KEY";

  expect(fn() => Apikey::fromEnvironment($envVariable))->toThrow(Exception::class);;
});

it("retrieves api key from env", function (): void {
  $apiKey = Apikey::fromEnvironment();

  expect($apiKey)->not->toBeEmpty();
});
