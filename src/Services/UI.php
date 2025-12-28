<?php

namespace WPPB\Services;

class UI
{
    /**
     * Generates an UI link tag based on the provided array.
     * If URL points to an external resource target attribute will be set to '_blank'.
     *
     * @param array $data Associative array containing 'url' and 'text' keys.
     * @return string UI link tag.
     */
    public static function link(array $data): string
    {
        $target = strpos($data['url'], $_SERVER['HTTP_HOST']) === false ? 'target="_blank"' : '';
        return '<a href="' . $data['url'] . '" ' . $target . '>' . $data['text'] . '</a>';
    }

    public static function noticeError(string $error): string
    {
        return '<div class="notice notice-error is-dismissible"><p>' . $error . '</p></div>';
    }

    public static function pageContainer(array $content): string
    {
        return '<div class="wrap">' . implode('', $content) . '</div>';
    }

    public static function pageTitle(string $title): string
    {
        return '<h1>' . $title . '</h1>';
    }

    public static function description(string $text): string
    {
        return '<p class="description">' . $text . '</p>';
    }

    public static function grid(array $content): string
    {
        return '<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">' . implode('', $content) . '</div>';
    }

    public static function featureCard(array $data): string
    {
        $title = $data['title'] ?? '';
        $description = $data['description'] ?? '';
        $icon = isset($data['icon']) ? '<span class="dashicons ' . $data['icon'] . '" style="font-size: 40px; width: 40px; height: 40px; margin-bottom: 15px; color: #2271b1;"></span>' : '';

        return '
        <div class="card" style="max-width: none; margin: 0; padding: 20px; display: flex; flex-direction: column; align-items: flex-start;">
            ' . $icon . '
            <h2>' . $title . '</h2>
            <p>' . $description . '</p>
        </div>';
    }


}