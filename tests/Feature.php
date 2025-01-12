<?php

declare(strict_types=1);

use PHPCrewsAi\Example;

it('example', function (): void {
    $example = new Example;

    $result = $example->foo();

    expect($result)->toBe('bar');
});
