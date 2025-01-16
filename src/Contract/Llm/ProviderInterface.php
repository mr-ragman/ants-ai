<?php

declare(strict_types=1);

namespace PHPCrewsAi\Contract\Llm;

interface ProviderInterface
{
    public function run(): LlmResponseInterface;
}
