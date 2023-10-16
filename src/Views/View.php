<?php

class View
{
    /**
     * Rendering html template.
     *
     * @param string $template
     * @param array $data
     * @return string
     */
    public function render(string $template, $data = []): string
    {
        return $this->getViewPath() . $template . '.php';
    }

    /**
     * Application view path.
     *
     * @return string
     */
    public function getViewPath(): string
    {
        return __DIR__ . '/../resources/views/';
    }
}