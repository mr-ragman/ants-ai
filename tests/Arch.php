<?php

declare(strict_types=1);

use PHPCrewsAi\Provider\LlmProvider;
use Psr\Http\Message\ResponseInterface;
use PHPCrewsAi\ValueObject\ResponseState;
use PHPCrewsAi\Contract\Llm\ProviderInterface;
use PHPCrewsAi\Contract\Llm\LlmResponseInterface;

test('strict types')
    ->expect('PHPCrewsAi')
    ->toUseStrictTypes()
    ->not->toUse(['die', 'dd', 'dump']);

test('contracts')
    ->expect('PHPCrewsAi\Contract')
    ->toOnlyUse([
        'PHPCrewsAi\ValueObject',
        ResponseInterface::class
    ])
    ->toBeInterfaces();

arch("response state")
    ->expect(ResponseState::class)
    ->toImplement(LlmResponseInterface::class);

arch("llm provider")
    ->expect(LlmProvider::class)
    ->toImplement(ProviderInterface::class);
