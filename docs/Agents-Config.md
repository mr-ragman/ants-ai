# Agent Config

## Arguments

Model to use for this Agent
private readonly string $llm,
# Agent name or id. Auto generated if not specified
private readonly string $nameId,
# Agent introduction. This is added to the chat history when a run is started.
private readonly string $greeting = "Hello!",
// Role of the agent.. to be used in ::==> You are a ROLE
private readonly string $role = "",
// string or instance of PromptInterface
private readonly string $objective = "",
// Team to which the agent belongs.
private readonly string $taskCodes = []
