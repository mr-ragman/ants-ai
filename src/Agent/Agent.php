<?php

declare(strict_types=1);

namespace AntsAi\Agent;

use AntsAi\Enum\Llm\SupportedLlms;
use AntsAi\ValueObject\AgentConfig;
use AntsAi\Provider\LlmProviderFactory;
use AntsAi\Contract\Agent\AgentInterface;
use AntsAi\Contract\Llm\LlmResponseInterface;

/**
 * @internal
 *
 * Generic Agent
 */
final class Agent implements AgentInterface
{
    private string $id;

    public function __construct(
        public readonly SupportedLlms|null $model = null,
        public readonly string $systemPrompt = "",
        public readonly AgentConfig|null $agentConfig = null
    ) {
        $this->generateId();
    }

    public function generateId(): void
    {
        $this->id = is_null($this->agentConfig) ? md5(date("YmdHis")) : $this->agentConfig->agentId;
    }

    public function id(): string
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function execute(string $message): LlmResponseInterface
    {
        /** @var AgentConfig $agentConfig */
        $agentConfig =  AgentConfigFactory::make(
            agentId: $this->id,
            model: $this->model,
            systemPrompt: $this->systemPrompt,
            prompt: $message,
            agentConfig: $this->agentConfig
        );

        return LlmProviderFactory::from($agentConfig)->run();
    }
}
