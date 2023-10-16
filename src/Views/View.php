<?php

class View
{
    public function render(string $template, $data = []): string
    {
        return $this->getViewPath() . $template . '.php';
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/../resources/views/';
    }
}