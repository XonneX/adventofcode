<?php

namespace XonneX\AdventOfCode\Y2020\Solutions\Day7;

use JetBrains\PhpStorm\Pure;
use Stringable;

class BagRule implements Stringable
{
    private string $type;

    /** @var array<BagRule>|null */
    private ?array $subRules = null;
    private ?int $amount = null;

    #[Pure]
    public static function createMainRule(string $type): self
    {
        $rule = new self();
        $rule->type = $type;
        return $rule;
    }

    public static function createRule(string $definition): self
    {
        $rule = new self();

        preg_match('/(.*) bags contain/', $definition, $matches);
        $rule->type = $matches[1];

        preg_match_all('/(\d) (.*?) bag[s]?[,.]/', $definition, $matches, PREG_SET_ORDER);
        $rule->subRules = [];

        foreach ($matches as $match) {
            $rule->subRules[] = self::createSubRule($match[2], $match[1]);
        }

        return $rule;
    }

    #[Pure]
    public static function createSubRule(string $type, int $amount): self
    {
        $rule = new self();
        $rule->type = $type;
        $rule->amount = $amount;
        return $rule;
    }

    public function isMain(): bool
    {
        return $this->subRules === null && $this->type === null;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function getSubRules(): ?array
    {
        return $this->subRules;
    }

    #[Pure]
    public function containsSubRule(BagRule $rule): bool
    {
        foreach ($this->subRules as $subRule) {
            if ($subRule->getType() === $rule->getType()) {
                return true;
            }
        }

        return false;
    }

    #[Pure]
    public function __toString(): string
    {
        return $this->getType();
    }
}
