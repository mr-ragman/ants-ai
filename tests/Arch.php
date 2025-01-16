<?php

declare(strict_types=1);

use AntsAi\Provider\LlmProvider;
use Psr\Http\Message\ResponseInterface;
use AntsAi\ValueObject\ResponseState;
use AntsAi\Contract\Llm\ProviderInterface;
use AntsAi\Contract\Llm\LlmResponseInterface;

test('strict types')
    ->expect('AntsAi')
    ->toUseStrictTypes()
    ->not->toUse(['die', 'dd', 'dump']);

test('contracts')
    ->expect('AntsAi\Contract')
    ->toOnlyUse([
        'AntsAi\ValueObject',
        ResponseInterface::class
    ])
    ->toBeInterfaces();

arch("response state")
    ->expect(ResponseState::class)
    ->toImplement(LlmResponseInterface::class);

arch("llm provider")
    ->expect(LlmProvider::class)
    ->toImplement(ProviderInterface::class);
