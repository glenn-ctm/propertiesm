<?php

namespace App\Traits;

trait ContextualLogger
{
    protected function getLoggerTag()
    {
        return $this::class;
    }

    public function logInContext(?string $message = null, ?array $data = null, string $level = 'debug')
    {
        $caller = debug_backtrace(limit: 2)[1];

        if (!isset($message) || is_null($message)) {
            $message = $caller['function'];
        }

        if (!isset($data) || is_null($data)) {
            $data = $caller['args'] ?? [];
        }

        logger()->log($level, $this->buildMessage($message), $data);
    }

    protected function buildMessage(string $message)
    {
        $tag = $this->getLoggerTag();
        return "[$tag]: $message";
    }
}
